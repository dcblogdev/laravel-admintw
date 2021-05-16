@props([
    'color' => 'green',
    'flash' => 'message'
])

@if (session()->has($flash))
    <div x-data="{ show: true }"
         x-show="show"
         x-init="setTimeout(() => show = false, 3000)"
         class="p-2 my-1 bg-{{ $color }}-200 rounded-md">
        {{ session($flash) }}
    </div>
@endif