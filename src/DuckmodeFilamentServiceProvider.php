<?php

namespace Sonjaturo\DuckmodeFilament;

use BladeUI\Icons\Factory;
use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentIcon;
use Livewire\Livewire;
use Sonjaturo\DuckmodeFilament\Assets\Audio;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
 
class DuckmodeFilamentServiceProvider extends PackageServiceProvider
{
    public static string $name = 'duckmode-filament';
 
    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasAssets();
    }

    public function packageBooted(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'duckmode');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'duckmode');

        // Bread Icons courtesy of the package andreiio/blade-iconoir
        $this->callAfterResolving(Factory::class, function (Factory $factory) {
            $factory->add('duckmode', [
                'path' => __DIR__ . '/../resources/svg',
                'prefix' => 'duckmode',
            ]);
        });

        FilamentIcon::register([
            'duckmode::widget.bread' => 'duckmode-regular-bread-slice',
        ]);

        Livewire::component('duckmode-feeder', FeederWidget::class);

        $this->publishes([
            __DIR__.'/../resources/audio' => public_path('vendor/duckmode-filament/audio'),
        ], "{$this->package->name}-assets");        

        // Asset Registration
        FilamentAsset::register(
            assets:[
                AlpineComponent::make('duckmode-feeder', __DIR__ . '/../resources/dist/components/duckmode-feeder.js'),
                Audio::make('duckmode-quack', __DIR__ . '/../resources/audio/quack.mp3'),
            ],
            package: 'sonjaturo/duckmode-filament'
        );
    }
}
