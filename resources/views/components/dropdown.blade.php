@props([
    'alignment' => 'right',
    'label' => ''
])

@php
    $alignmentClasses = [
        'left' => 'left-0',
        'right' => 'right-0'
    ];
@endphp

<div class="relative" x-data="{ open: false }" @click.away="open = false">
    <div>
        <span class="rounded-md shadow-sm static z-50">
            <button @click="open = !open" type="button" {{ $attributes->merge(['class' => 'inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white dark:bg-gray-900 dark:text-gray-200 text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition ease-in-out duration-150']) }} id="options-menu" aria-haspopup="true" x-bind:aria-expanded="open" aria-expanded="true">
                {{ $label }}

                <svg class="-mr-1 ml-2 h-5 w-5" x-description="Heroicon name: chevron-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </span>
    </div>

    <div
        class="absolute {{ $alignmentClasses[$alignment] }} z-20 bg-white dark:bg-gray-900 rounded shadow-md mt-1 w-full"
        x-show="open"
        x-transition:enter="transition transform duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition transform duration-300"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
    >
        {{ $slot }}
    </div>
</div>
