<?php

namespace Sonjaturo\DuckmodeFilament;

use Filament\Widgets\Widget;

class FeederWidget extends Widget
{
    protected static string $view = 'duckmode::feeder-widget';

    protected string $assetName = 'quack';

    public string $audioAsset = '';

    public function __construct()
    {
        $this->audioAsset = filament('duckmode-filament')
            ->getAudioAssetsPath()."/{$this->assetName}.mp3";
    }

}
