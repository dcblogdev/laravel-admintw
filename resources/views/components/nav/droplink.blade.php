@php
use Illuminate\Support\Str;
@endphp

@props(['href' => '', 'icon' => ''])
<a href="{{ $href }}" class="{{ Str::endsWith(request()->url(), $href) ? 'bg-gray-100 text-gray-700' : 'text-gray-100' }}  dark:text-gray-400 border-transparent hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
    <div class="flex items-center">
        @if ($icon)
            <i class="{{ $icon }} pr-1"></i>
        @endif
        {{ $slot }}
    </div>
</a>



