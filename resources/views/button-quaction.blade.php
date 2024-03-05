<x-filament-actions::action
    :action="$action"
    :badge="$getBadge()"
    :badge-color="$getBadgeColor()"
    dynamic-component="filament::link"
    :icon-position="$getIconPosition()"
    :size="$getSize()"
    class="fi-ac-link-action"
    x-data="{}"
    x-on:click="$refs.duckmodeAudio.play()"
>
    <audio src="{{ $getAudioAsset() }}" x-ref="duckmodeAudio"></audio>
    {{ $getLabel() }}
</x-filament-actions::action>
