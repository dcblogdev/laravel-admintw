@auth
<div x-data="{ isOpenUserMenu: false }">

    <button @click="isOpenUserMenu = !isOpenUserMenu">
        @if (storage_exists(auth()->user()->image))
            <img src="{{ storage_url(auth()->user()->image) }}" width="30" class="h-6 w-6 rounded-full">
        @else
            {{ auth()->user()->name }}
        @endif
    </button>

    <div
        x-show.transition="isOpenUserMenu"
        class="fixed z-50 overflow-hidden"
        aria-labelledby="slide-over-title" role="dialog"
        aria-modal="true"
    >
        <div class="absolute inset-0 overflow-hidden bg-gray-500 bg-opacity-75 transition-opacity">

            <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex sm:pl-16">

                <div class="w-screen max-w-60">
                    <div class="h-full flex flex-col bg-white dark:bg-gray-700 dark:text-gray-300 shadow-xl overflow-y-scroll">

                        <div class="py-6">
                            <div class="flex items-start justify-end">

                                <div class="flex items-center">
                                    <button @click="isOpenUserMenu = !isOpenUserMenu" class="pr-2 text-gray-400 hover:text-gray-500">
                                        <span class="sr-only">{{ __('Close panel') }}</span>
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <ul class="menu overflow-y-auto px-5">

                            @can('view_users_profiles')
                                <x-dropdown-link :href="route('admin.users.show', auth()->user())">{{ __('View Profile') }}</x-dropdown-link>
                            @endcan

                            @can('edit_own_account')
                                <x-dropdown-link :href="route('admin.users.edit', auth()->user())">{{ __('Edit Account') }}</x-dropdown-link>
                            @endcan

                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               class="block px-4 py-2 text-sm text-gray-700 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-400">{{ __('Log out') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="post">
                                {{ csrf_field() }}
                            </form>

                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endauth