<?php

namespace Sonjaturo\DuckmodeFilament;

use Filament\Contracts\Plugin;
use Filament\Panel;

class DuckmodeFilamentPlugin implements Plugin
{
    public function getId(): string
    {
        return 'duckmode-filament';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->widgets([
                ...$panel->getWidgets(),
                FeederWidget::class,
            ]);
    }

    public function boot(Panel $panel): void
    {

    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }

    public function getAudioAssetsPath(): string
    {
        return ltrim("vendor/{$this->getId()}/audio", '/');
    }
}
