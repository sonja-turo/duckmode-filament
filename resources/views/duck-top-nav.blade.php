<div class="border rounded py-2 px-4 flex gap-2"
    ax-load
    ax-load-src="{{ \Filament\Support\Facades\FilamentAsset::getAlpineComponentSrc('duckmode-topnav', 'sonjaturo/duckmode-filament') }}"
    x-data="topNav()"
>
    <div class="h-4 w-4">
        @include('duckmode::duck-mode')
    </div>
    <div class="text-xs text-gray-500 dark:text-gray-400" @duck-murder.window="duckMurdered($event)">
        <span x-text="ducksMurdered" class="font-bold"></span> {{ __('duckmode::duck.Ducks-murdered') }}.
    </div>
</div>
