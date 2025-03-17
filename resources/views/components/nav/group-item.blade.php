@props([
    'route' => '',
    'icon' => ''
])
<a wire:navigate href="{{ route($route) }}" class="block py-2 px-4 rounded-md {{ url()->current() == route($route)
    ? 'bg-blue-50 border border-blue-100 text-gray-700'
    : 'text-gray-700 dark:hover:bg-gray-700 dark:hover:text-gray-100 dark:text-gray-100 hover:bg-blue-50 hover:text-gray-900'
}}">
    <div class="flex gap-2">
        @if ($icon)
            <span class="flex flex-none items-center">
                <x-dynamic-component :component="'heroicon-o-' . $icon" class="size-5 text-gray-400 group-hover:text-blue-500 dark:text-gray-500 dark:group-hover:text-gray-300" />
            </span>
        @endif
        <span>{{ $slot }}</span>
    </div>
</a>
