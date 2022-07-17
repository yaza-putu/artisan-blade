# Make blade file laravel with artisan command
![artisan command](https://res.cloudinary.com/dk0053zbe/image/upload/v1657471606/artisan-blade/articleocw-57c5d562e9aaa_sxc3jj.png)
<hr>

[![Latest Version on Packagist](https://img.shields.io/packagist/v/yaza/artisan-blade.svg?style=flat-square)](https://packagist.org/packages/yaza/artisan-blade)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/yaza/artisan-blade/run-tests?label=tests)](https://github.com/yaza-putu/artisan-blade/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/yaza/artisan-blade/Check%20&%20fix%20styling?label=code%20style)](https://github.com/yaza-putu/artisan-blade/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/yaza/artisan-blade.svg?style=flat-square)](https://packagist.org/packages/yaza/artisan-blade)

## requirement
- Laravel 9.*
- PHP 8.1

## Description
This package can make blade file laravel with artisan command, and setup a template html with stub file 
## Installation

You can install the package via composer:

```bash
composer require yaza/artisan-blade --dev
```
You can publish the config file with (Optional):

```bash
php artisan vendor:publish --tag="artisan-blade-config"
```

## Usage
### artisan command
1. Create file blade
```php
php artisan make:blade blade_name
```
2. Create file blade with directory
```php
php artisan make:blade path/blade_name
```
3. Create file blade with template stub (note : you need publish config this package)
```php
php artisan make:blade path/blade_name --stub=stubfile
```
### Make and customize template stub file
1. you need publish this config with
```bash
php artisan vendor:publish --tag="artisan-blade-config"
```
2. setting config path
```php
<?php
return [
    /*
    * Default location template
    */
    "path" => "template",

    /*
    * select default stub file
    */
    "default" => "default"
];
```
3. you need create folder template in folder resources 
4. create file *.stub, if you set the default stub file as default you need create default.stub in folder template
![folder structure](https://res.cloudinary.com/dk0053zbe/image/upload/v1657470743/artisan-blade/Screen_Shot_2022-07-11_at_00.15.43_kyeidz.png)

## Example
1. php artisan make:blade user
![artisan blade](https://res.cloudinary.com/dk0053zbe/image/upload/v1657470752/artisan-blade/Screen_Shot_2022-07-11_at_00.18.07_uyzryc.png)
2. php artisan make:user --stub=modal
![stub modal](https://res.cloudinary.com/dk0053zbe/image/upload/v1657470752/artisan-blade/Screen_Shot_2022-07-11_at_00.18.37_aaee4x.png)
## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/yaza-putu/.github/blob/main/CONTRIBUTING.md) for details.

## Credits

- [yaza](https://github.com/yaza-putu)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
