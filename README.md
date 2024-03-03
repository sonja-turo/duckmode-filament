# Duck Mode for Filament

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sonja-turo/duckmode-filament.svg?style=flat-square)](https://packagist.org/packages/sonja-turo/duckmode-filament)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/sonja-turo/duckmode-filament/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/sonja-turo/duckmode-filament/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/sonja-turo/duckmode-filament/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/sonja-turo/duckmode-filament/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/sonja-turo/duckmode-filament.svg?style=flat-square)](https://packagist.org/packages/sonja-turo/duckmode-filament)



This is what you get when you have a slow Saturday night and nobody around to annoy. You annoy the rest of the world.

## Installation

Firstly, pour yourself a large draw of your favourite drink. Don't mind me, I'll wait.

...

Ok, done? Now, install the package via composer:

```bash
composer require sonja-turo/duckmode-filament
```

Next, because Duck Mode without Quacking is just a silly package instead of the life changing experience it was designed to be, install the assets:

```bash
php artisan vendor:publish --tag="duckmode-filament-assets"
```

## Usage

### Adding Duck Mode to your admin panel
Firstly, register the plugin with your panel. It's easy, don't be shy, just open the relevant FilamenttPHP
Panel Provider, and add the plugin file.

```php
use Sonjaturo\DuckmodeFilament\DuckmodeFilamentPlugin;
...
public function panel(Panel $panel): Panel
{
    return $panel
        ...
        ->plugin(DuckmodeFilamentPlugin::make());
}
```

### Feeder Widget
Add the Feeder Widget to anywhere in your FilamentPHP dashboard by appending it to the `widgets` array in
your panel's configuration.

```php
use Sonjaturo\DuckmodeFilament\FeederWidget;
...
public function panel(Panel $panel): Panel
{
    return $panel
        ...
        ->widgets([
            Widgets\AccountWidget::class,
            Widgets\FilamentInfoWidget::class,
            FeederWidget::class,
        ]);
}
```

## Testing

I didn't do any. Why should I make you?

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently, or to read something that is most likely horribly wrong.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details. You know I never bothered to read the stub for this, right?

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities. Nope, didn't read this either. But you're installing
this anyway, and even I'm telling you not to. Says more about you than it does me.

## Credits

- [SonjaTuro](https://github.com/sonja-turo)
- [Team Shitware](https://github.com/shitware-ltd)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information. My God, you read this far.
