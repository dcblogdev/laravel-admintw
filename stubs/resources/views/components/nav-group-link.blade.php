@props(['href' => ''])
<li class="{{ Str::endsWith(request()->url(), $href) ? 'bg-gray-700 dark:bg-gray-500' : '' }} text-gray-300 text-sm p-3 hover:bg-gray-900 hover:text-gray-200">
    <a class="flex items-center" href="{{ $href }}">
        {{ $slot }}
    </a>
</li>
