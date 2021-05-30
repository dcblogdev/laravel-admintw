@props([
    'color' => 'blue',
    'name' => '',
    'id' => '',
    'href' => '#'
])

<a href="{{ $href }}" id="{{ $id }}" {{ $attributes->merge(['class' => "text-$color-600 dark:text-$color-300"]) }}>
    {{ $slot }}
</a>