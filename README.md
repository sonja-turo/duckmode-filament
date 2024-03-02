# This is my package duckmode-filament

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sonja-turo/duckmode-filament.svg?style=flat-square)](https://packagist.org/packages/sonja-turo/duckmode-filament)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/sonja-turo/duckmode-filament/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/sonja-turo/duckmode-filament/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/sonja-turo/duckmode-filament/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/sonja-turo/duckmode-filament/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/sonja-turo/duckmode-filament.svg?style=flat-square)](https://packagist.org/packages/sonja-turo/duckmode-filament)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require sonja-turo/duckmode-filament
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="duckmode-filament-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="duckmode-filament-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="duckmode-filament-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$duckmodeFilament = new Sonjaturo\DuckmodeFilament();
echo $duckmodeFilament->echoPhrase('Hello, Sonjaturo!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [SonjaTuro](https://github.com/sonja-turo)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
