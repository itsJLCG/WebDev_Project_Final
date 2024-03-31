<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['color','icon','iconSize','labelSrOnly','size','tooltip','class','labeledFrom','outlined','labeledFrom'])
<x-filament::button :color="$color" :icon="$icon" :icon-size="$iconSize" :label-sr-only="$labelSrOnly" :size="$size" :tooltip="$tooltip" :class="$class" :labeledFrom="$labeledFrom" :outlined="$outlined" :labeled-from="$labeledFrom" >

{{ $slot ?? "" }}
</x-filament::button>