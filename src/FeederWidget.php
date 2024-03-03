<?php

namespace Sonjaturo\DuckmodeFilament;

use Filament\Widgets\Widget;

class FeederWidget extends Widget
{
    protected static string $view = 'duckmode::feeder-widget';

    protected string $assetName = 'quack';

    public string $audioAsset = '';

    protected static ?array $options = [
        'rotation' => 270, // start angle in degrees
        'circumference' => 180, // sweep angle in degrees
        'height' => 60,
        'width' => 60,
    ];

    public function __construct()
    {
        $this->audioAsset = filament('duckmode-filament')
            ->getAudioAssetsPath() . "/{$this->assetName}.mp3";
    }

    protected function getChartData(): array
    {
        return [
            'datasets' => [[
                'data' => [100, 0],
                'backgroundColor' => ['Green', 'Gray'],
            ]],
        ];
    }

    protected function getChartOptions(): ?array
    {
        return static::$options;
    }

    protected function getChartType(): string
    {
        return 'hunger';
    }

    protected function getLang(): array
    {
        return [
            'ok' => __('duckmode::duck.ok'),
            'hungry' => __('duckmode::duck.hungry'),
            'starving' => __('duckmode::duck.starving'),
        ];
    }
}
