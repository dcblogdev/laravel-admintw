@props([
    'routeName' => '.'
])

@php
$openState = Route::is($routeName.'*') ? '{ open: true }' : '{ open: false }';
@endphp

<li class="relative" x-data="{{ $openState }}">
    <div @click="open = ! open">
        <div class="flex flex-items w-full cursor-pointer text-gray-300 text-sm p-3 hover:bg-gray-900 hover:text-gray-200">
            {{ $trigger }}

            <svg x-show="!open" class="ml-auto h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>

            <svg x-show="open" class="ml-auto h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
        </div>

    </div>

    <div x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            style="display: none;"
            @click="open = false">
        <div>
            <ul>
                {{ $content }}
            </ul>
        </div>
    </div>
</li>
