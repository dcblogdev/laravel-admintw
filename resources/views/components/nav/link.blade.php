@props([
    'route' => '',
    'icon' => '',
    'navEnabled' => true,
])

@php
    $isActive = request()->routeIs($route);
@endphp

<a @if($navEnabled) wire:navigate @endif
    href="{{ route($route) }}"
    class="group flex items-center gap-2 rounded-lg px-2.5 text-sm
    {{ $isActive
        ? 'border border-blue-100 bg-blue-50 text-gray-700 dark:border-none dark:bg-gray-700 dark:text-white'
        : 'hover:bg-blue-50 dark:hover:bg-gray-500/75 text-gray-700 dark:text-white dark:hover:bg-opacity-100 text-gray-700 dark:text-white'
    }}">

    @if ($icon)
        <span class="flex flex-none items-center">
            <x-dynamic-component :component="'heroicon-o-' . $icon" class="size-5 {{ $isActive ? 'dark:text-gray-200' : 'text-gray-400 group-hover:text-blue-500 dark:text-gray-500 dark:group-hover:text-gray-300' }}" />
        </span>
    @endif

    <span class="grow py-2">{{ $slot }}</span>
</a>
