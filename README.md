# Laravel G4T WebShot 

## Introduction

Laravel G4T WebShot is a powerful PHP package designed to capture screenshots or generate PDFs from any web page.
It provides robust functionality for managing and retrieving screen dimensions based on predefined identifiers.

![Laravel G4T WebShot](https://github.com/hussein4alaa/laravel-g4t-webshot/blob/main/banner.png?raw=true)

## Installation

To install the Laravel G4T WebShot, follow these steps:

1. Install via Composer:

   ```php
   composer require g4t/webshot
   ```

## Usage

### Getting Started

1. Capture and Return Full Path:

To capture a screenshot of a web page and return its URL:

```php
use g4t\WebShot\Screenshot;

$save_path = public_path('files/save.png');
return Screenshot::take('https://google.com')
                  ->size('14-inc')
                  ->saveAs($save_path)
                  ->url();
```


2. Capture and Download:

To capture a screenshot of a web page and download it directlyURL:
```php
use g4t\WebShot\Screenshot;

$save_path = public_path('files/save.png');
return Screenshot::take('https://google.com')
                  ->size('14-inc')
                  ->saveAs($save_path)
                  ->path();
```


3. Capture and Download:

To capture a screenshot of a web page and download it directly:
```php
use g4t\WebShot\Screenshot;

$save_path = public_path('files/save.png');
return Screenshot::take('https://google.com')
          ->size('14-inc')
          ->saveAs($save_path)
          ->download();

```



4. Custom Size:

To specify custom dimensions for the screenshot:
```php
use g4t\WebShot\Screenshot;

$save_path = public_path('files/save.png');
return Screenshot::take('https://google.com')
          ->customSize(width: 1000, height: 1000)
          ->saveAs($save_path)
          ->download();

```


5. The following screen sizes are available:
```php
'13-inc',
'14-inc',
'15-inc',
'16-inc',
'iphone-SE1st',
'iphone-SE-2nd',
'iphone-6',
'iphone-6s',
'iphone-7',
'iphone-8',
'iphone-8-plus',
'iphone-11-pro-max',
'ipad-landscape',
'ipad-pro-10.5-landscape',
'ipad-pro-11-inch-landscape',
'ipad-pro-12.9-inch-landscape',
'full-hd',
'2k',
'4k'
```

## Contributing

Contributions to the Laravel G4T WebShot Package are always welcome! If you find any issues or have suggestions for improvements, please feel free to open an issue or submit a pull request.


## License

The Swagger Laravel G4T WebShot is open-source software licensed under the [MIT license](LICENSE.md).

## Credits

The Laravel G4T WebShot Package is developed and maintained by [HusseinAlaa](https://www.linkedin.com/in/hussein4alaa/).
