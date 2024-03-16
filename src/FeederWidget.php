<?php

namespace Sonjaturo\DuckmodeFilament;

use Filament\Notifications\Notification;
use Filament\Widgets\Widget;
use Filament\Widgets\WidgetConfiguration;
use Livewire\Attributes\On;

class FeederWidget extends Widget
{
    protected static string $view = 'duckmode::feeder-widget';

    protected string $assetName = 'quack';

    public string $audioAsset = '';

    public int $starvationRate = 1000;

    public int $bread = 5;

    public bool $reportMurders = true;

    public array $ducks = [];

    protected static ?array $options = [
        'rotation' => 270, // start angle in degrees
        'circumference' => 180, // sweep angle in degrees
    ];

    public function __construct()
    {
        $this->audioAsset = filament('duckmode-filament')
            ->getAudioAssetsPath() . "/{$this->assetName}.mp3";
    }

    public function mount()
    {
        if (count($this->ducks) == 0) {
            $this->ducks = [
                Duck::make()->toArray()
            ];
        }
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

    public static function make(array $properties = []): WidgetConfiguration
    {
        $bread = (isset($properties['bread']) && $properties['bread'] instanceof Bread) ? $properties['bread'] : new Bread(BreadType::White);
        $properties['bread'] = $bread->getHealthValue();

        if(isset($properties['ducks'])) {
            foreach($properties['ducks'] as $index => $duck) {
                if ($duck instanceof Duck) {
                    $properties['ducks'][$index] = $duck->toArray();
                }
            }
        }

        return parent::make($properties);
    }

    #[On('duck-murder')]
    public function confrontMonster(): void
    {
        if (! $this->reportMurders) {
            return;
        }

        Notification::make()
            ->danger()
            ->icon('duckmode-ducky')
            ->title(__('duckmode::duck.notifications_murderer_title'))
            ->body(__('duckmode::duck.notifications_murderer_body'))
            ->send();
    }
}
