<?php

namespace Sonjaturo\DuckmodeFilament;

use Livewire\Component;

class DuckTopNav extends Component
{
    protected static string $view = 'duckmode::duck-top-nav';

    public function render()
    {
        return view(static::$view);
    }
}
