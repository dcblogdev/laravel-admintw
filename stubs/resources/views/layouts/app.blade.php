<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title ?? null }} - {{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>

    <div x-data="{ sidebarOpen: false }">
        <div class="flex min-h-screen">

            @auth
                <!-- regular sidebar -->
                <div class="sidebar hidden flex-none w-full md:block md:w-60 px-4 bg-primary dark:bg-gray-700">
                    @include('layouts.navigation')
                </div>

                <!--sidebar on mobile-->
                <div x-show="sidebarOpen" class="sidebar min-w-full px-4 bg-primary dark:bg-gray-700 md:hidden">
                    @include('layouts.navigation')
                </div>
            @endauth

            <div id="main" class="w-full bg-gray-100 dark:bg-gray-600">

                @auth
                    <div class="flex justify-between mb-5 bg-white dark:bg-gray-700 border-b-4 border-primary px-2 py-2">

                        <div class="flex">
                            <button @click.stop="sidebarOpen = !sidebarOpen" class="md:hidden focus:outline-none pl-1 pr-2">
                                <svg class="w-6 transition ease-in-out duration-150 text-gray-900 dark:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"/>
                                </svg>
                            </button>

                            <livewire:admin.search />

                        </div>

                        <div class="flex">
                            <livewire:admin.notifications-menu />
                            <livewire:admin.help-menu />
                            <livewire:admin.users.user-menu />
                        </div>
                    </div>
                @endauth

                <div class="px-7 py-5">
                    {{ $slot ?? '' }}
                </div>
            </div>

        </div>

        <div class="bg-white dark:bg-gray-900 dark:text-gray-300 p-5 flex justify-between text-xs">
            <div>{{ __('Copyright') }} &copy; {{ date('Y') }} {{ config('app.name') }}</div>
        </div>

    </div>

    </body>
</html>
