<div x-data="{ isOpen: false }">
    <div>
        <button @click="isOpen = !isOpen" class="focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </button>
    </div>

    <div
        x-show="isOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-x-full"
        x-transition:enter-end="opacity-100 transform translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform translate-x-0"
        x-transition:leave-end="opacity-0 transform translate-x-full"
        @click.away="isOpen = false"
        class="absolute w-48 origin-top-right right-14">
        <div class="relative z-30 bg-white border border-gray-100 shadow-xs rounded-b-md dark:bg-gray-700">
            <a href="http://laraveladmintw.com/docs" target="_blank"
               class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:text-gray-200 dark:hover:bg-gray-600 focus:outline-none">{{ __('Theme Docs (External)') }}</a>
            <a href="{{ route('developer-reference') }}"
               class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:text-gray-200 dark:hover:bg-gray-600 focus:outline-none">{{ __('Developer Reference') }}</a>
        </div>

    </div>
</div>
