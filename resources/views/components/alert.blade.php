@props(['color' => 'blue'])
<div x-data="{ show: true }"
     x-show="show"
     x-init="setTimeout(() => show = false, 3000)"
     class="p-2 bg-{{ $color }}-200 rounded">
    {{ $slot }}
</div>