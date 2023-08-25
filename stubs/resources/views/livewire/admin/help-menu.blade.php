<div x-data="{ isOpen: false }">
    <div>
        <button @click="isOpen = !isOpen" class="px-2 pt-2 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-800 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </button>
    </div>

    <div
        x-show.transition="isOpen"
        @click.away="isOpen = false"
        class="absolute w-48 origin-top-right right-14">
        <div class="relative z-30 bg-white border border-gray-100 shadow-xs rounded-b-md dark:bg-gray-700">
            <x-dropdown-link href="http://laraveladmintw.com/docs">{{ __('Theme Docs') }}</x-dropdown-link>
        </div>

    </div>
</div>
