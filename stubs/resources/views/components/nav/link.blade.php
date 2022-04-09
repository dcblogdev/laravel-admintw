@props([
    'route' => '',
    'icon' => ''
])
<a href="{{ route($route) }}" class="flex items-center px-2 py-2 my-2 {{ Route::is($route) ? 'bg-gray-100 dark:bg-gray-500 text-black dark:text-gray-100' : 'text-gray-100' }} hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-100 hover:text-gray-800 rounded-md cursor-pointer">
    @if ($icon)
        <i class="{{ $icon }} pr-2"></i>
    @endif
    <span>{{ $slot }}</span>
</a>