<?php

namespace g4t\WebShot;

trait Helper {
    private $sizes = [
        '13-inc' => [
            'width' => 1440,
            'height' => 900
        ],
        '14-inc' => [
            'width' => 1366,
            'height' => 768
        ],
        '15-inc' => [
            'width' => 1920,
            'height' => 1080
        ],
        '16-inc' => [
            'width' => 3072,
            'height' => 1920
        ],
        'iphone-SE1st' => [
            'width' => 320,
            'height' => 568
        ],
        'iphone-SE-2nd' => [
            'width' => 375,
            'height' => 667
        ],
        'iphone-6' => [
            'width' => 375,
            'height' => 667
        ],
        'iphone-6s' => [
            'width' => 375,
            'height' => 667
        ],
        'iphone-7' => [
            'width' => 375,
            'height' => 667
        ],
        'iphone-8' => [
            'width' => 375,
            'height' => 667
        ],
        'iphone-8-plus' => [
            'width' => 414,
            'height' => 736
        ],
        'iphone-11-pro-max' => [
            'width' => 414,
            'height' => 896
        ],
        'ipad-landscape' => [
            'width' => 1024,
            'height' => 768
        ],
        'ipad-pro-10.5-landscape' => [
            'width' => 1112,
            'height' => 834
        ],
        'ipad-pro-11-inch-landscape' => [
            'width' => 1194,
            'height' => 834
        ],
        'ipad-pro-12.9-inch-landscape' => [
            'width' => 1366,
            'height' => 1024
        ],
        'full-hd' => [
            'width' => 1920,
            'height' => 1080
        ],
        '2k' => [
            'width' => 2560,
            'height' => 1440
        ],
        '4k' => [
            'width' => 3840,
            'height' => 2160
        ]
    ];


    public function getSize($size)
    {
        return $this->sizes[$size] ?? null;
    }

}
