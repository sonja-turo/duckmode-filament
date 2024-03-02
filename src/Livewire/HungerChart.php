<?php

namespace Sonjaturo\DuckmodeFilament\Livewire;

use Filament\Widgets\ChartWidget;

class HungerChart extends ChartWidget
{
    protected static ?string $heading = 'Hunger Level';

    protected static ?array $options = [
        'rotation'=> 270, // start angle in degrees
        'circumference' => 180, // sweep angle in degrees
        'height' => 60,
        'width' => 60,
    ];

    protected function getData(): array
    {
        return [
            'labels' => ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            'datasets' =>[[
                'label'=> '# of Votes',
                'data'=> [12, 19, 3, 5, 2, 3],
                'backgroundColor'=> ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"]
            ]]
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
