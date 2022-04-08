<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('scripts')
    <livewire:styles/>
</head>
<body>

<div x-data="{ sidebarOpen: false }">
    <div class="flex min-h-screen">

        @auth
            <!-- regular sidebar -->
            <div class="hidden flex-none w-full md:block md:w-60 px-4 bg-primary dark:bg-gray-700">
                @include('layouts.app.navigation')
            </div>

            <!--sidebar on mobile-->
            <div x-show.transition.origin.top.left="sidebarOpen" class="min-w-full px-4 bg-primary dark:bg-gray-700 md:hidden">
                @include('layouts.app.navigation')
            </div>
        @endauth

        <div id="main" class="w-full bg-gray-100 dark:bg-gray-600">

            @auth
            <div class="flex justify-between mb-5 bg-white dark:bg-gray-700 px-2 py-1">

                <div class="flex">
                    <button @click.stop="sidebarOpen = !sidebarOpen" class="md:hidden focus:outline-none pl-1 pr-2">
                        <svg class="w-6 transition ease-in-out duration-150 text-gray-900 dark:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"/>
                        </svg>
                    </button>

                    <livewire:admin.search />
                </div>

                <div class="flex">
                    <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                        <svg id="theme-toggle-dark-icon" class="w-6 h-6 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        <svg id="theme-toggle-light-icon" class="w-6 h-6 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                    </button>

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
        <div>{{ __('Copyright') }} &copy; {{ date('Y') }} {{ config('admin.name') }}</div>
    </div>

</div>

<livewire:scripts />
</body>
</html>