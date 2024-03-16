<?php

namespace Sonjaturo\DuckmodeFilament\Tables;

use Filament\Support\Facades\FilamentIcon;
use Filament\Tables\Actions\Action;

class Quaction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->label(__('duckmode::duck.quack'));

        $this->color('gray');

        $this->icon(FilamentIcon::resolve('duckmode::ducky'));
        $this->link(true);

        $this->view('duckmode::button-quaction');

        $this->action(function (): void {

        });
    }

    public static function getDefaultName(): ?string
    {
        return 'quack';
    }

    public function getAudioAsset()
    {
        return filament('duckmode-filament')
            ->getAudioAssetsPath() . '/quack.mp3';
    }
}
