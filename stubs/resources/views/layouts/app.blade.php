<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? '' }} {{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <livewire:styles/>
</head>
<body>

    <div x-data="{ sidebarOpen: false }">

    <div class="flex justify-between bg-white dark:bg-gray-700 dark:text-white border-b-1">

        <div class="flex p-3">

            <!--toggle sidebar on mobile-->
            <button @click.stop="sidebarOpen = !sidebarOpen" class="md:hidden focus:outline-none pl-1 pr-2">
                <svg class="w-6 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"/>
                </svg>
            </button>

            <a href="{{ route('app') }}" class="font-bold">
                {{ config('app.name') }}
            </a>

        </div>

        @auth
            <div class="pt-2 pr-2">
               <livewire:user-menu/>
            </div>
        @endauth

    </div>

    <div class="flex min-h-screen">

        @auth
            <!-- regular sidebar -->
            <div class="hidden flex-none w-full md:block md:w-56 bg-gray-800">
                @include('layouts.navigation')
            </div>

            <!--sidebar on mobile-->
            <div x-show.transition.origin.top.left="sidebarOpen" class="min-w-full bg-gray-800 md:hidden">
                @include('layouts.navigation')
            </div>
        @endauth

        <!-- main content -->
        <div class="w-full bg-gray-200 dark:bg-gray-600 p-5">
            @yield('content')
            {{ $slot ?? '' }}
        </div>

    </div>

    <div class="bg-white dark:bg-gray-900 dark:text-gray-300 p-5 flex justify-between text-xs">
        <div>{{ __('Copyright') }} &copy; {{ date('Y') }} {{ config('app.name') }}</div>
    </div>

</div>

<livewire:scripts />
</body>
</html>
