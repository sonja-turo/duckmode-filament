<x-filament-widgets::widget class="fi-account-widget flex flex-col gap-4">
    @foreach($ducks as $duck)
    <x-filament::section>
        <div 
            x-ignore
            ax-load
            ax-load-src="{{ \Filament\Support\Facades\FilamentAsset::getAlpineComponentSrc('duckmode-feeder', 'sonjaturo/duckmode-filament') }}"
            x-data="duckFeederWidget({
                duckId: '{{ $duck['slug'] }}',
                chart: {
                        cachedData: @js($this->getChartData()),
                        options: @js($this->getChartOptions()),
                        type: @js($this->getChartType()),
                    },
                lang: @js($this->getLang()),
                starvationRate: {{ $duck['starvationRate'] }},
                breadHealth: {{ $duck['bread'] }}
                })"
            class="flex items-center gap-x-3"
        >
            <div class="h-10 w-10">
                @include('duckmode::duck-mode')
            </div>
            <div>
                <h2
                    class="grid flex-1 text-base font-semibold leading-6 text-gray-950 dark:text-white"
                >
                    {{ $duck['name'] }}
                </h2>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    <span class="capitalize">{{ __('duckmode::duck.murdered') }}</span>
                    <span x-text="ducksMurdered" class="font-bold"></span>
                    {{ __('duckmode::duck.times') }}.
                </p>
            </div>
            <div class="flex-1 flex justify-center">
                <div style="position: relative; height:70px;">
                    <canvas
                        x-ref="canvas"
                    ></canvas> 
                </div>
            </div>
            <div>
                <audio src="{{ $audioAsset }}" x-ref="duckmodeAudio"></audio>
                <x-filament::button
                    color="gray"
                    icon="duckmode-regular-bread-slice"
                    icon-alias="duckmode::widget.bread"
                    labeled-from="sm"
                    tag="button"
                    type="button"
                    x-on:click="feedDuck"
                >
                    {{ __('duckmode::duck.give-bread') }}
                </x-filament::button>
            </div>
        </div>
    </x-filament::section>
    @endforeach
</x-filament-widgets::widget>
