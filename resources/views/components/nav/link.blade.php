@props([
    'route' => '',
    'icon' => '',
    'navEnabled' => true,
])
<a @if($navEnabled) wire:navigate @endif href="{{ route($route) }}" class="flex items-center px-2 py-2 my-2 {{ Route::is($route."*") ? 'bg-gray-100 dark:text-gray-900 hover:text-gray-800' : 'text-white' }} hover:bg-gray-100 hover:text-gray-800 rounded-md cursor-pointer">
    @if ($icon)
        <i class="{{ $icon }} pr-2"></i>
    @endif
    <span>{{ $slot }}</span>
</a>
