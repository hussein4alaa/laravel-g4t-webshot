<?php

namespace g4t\WebShot;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Screenshot
{
    use Helper;
    private $url;

    private $outputPath;

    private $width = 1366;

    private $height = 768;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public static function take($url)
    {
        return new static($url);
    }

    public function saveAs($outputPath)
    {
        $this->createDirectoryIfNotExists($outputPath);
        $this->outputPath = $outputPath;
        return $this;
    }


    private function createDirectoryIfNotExists($outputPath)
    {
        $dir = dirname($outputPath);
        if (!File::exists($dir)) {
            File::makeDirectory($dir, 0755, true);
        }
    }

    private function getScriptPath()
    {
        return __DIR__ . '/js/screenshot.js';
    }

    private function executeProcess($scriptPath, $outputPath)
    {
        $extension = strtolower(pathinfo($outputPath, PATHINFO_EXTENSION));
        $process = new Process(['node', $scriptPath, $this->url, $outputPath, $extension, $this->width, $this->height]);
        $process->run();
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
    }


    public function CustomSize($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
        return $this;
    }

    public function size($size = '14-inc')
    {
        $dimensions = (object)$this->getSize($size);
        if (isset($dimensions->width)) {
            $this->width = $dimensions->width;
            $this->height = $dimensions->height;
        }
        return $this;
    }


    public function download()
    {
        $this->generate();
        return response()->download($this->outputPath);
    }

    public function path()
    {
        $this->generate();
        return $this->outputPath;
    }


    public function url()
    {
        $this->generate();
        if (strpos($this->outputPath, public_path()) === 0) {
            $relativePath = str_replace(public_path(), '', $this->outputPath);
            return url($relativePath);
        } elseif (strpos($this->outputPath, Storage::disk('public')->path('')) === 0) {
            $relativePath = str_replace(Storage::disk('public')->path(''), '', $this->outputPath);
            return Storage::disk('public')->url($relativePath);
        } else {
            return $this->outputPath;
        }
    }

    private function generate()
    {
        $scriptPath = $this->getScriptPath();
        $this->executeProcess($scriptPath, $this->outputPath);
        return $this;
    }
}
