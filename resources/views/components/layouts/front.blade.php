<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="relative" x-data="{ open: false }">

    <div class="relative pt-6">

        <div class="max-w-screen-xl mx-auto px-4 py-4 sm:px-6">
            <nav class="relative flex items-center justify-between sm:h-10 md:justify-center">
                <div class="md:absolute md:flex md:items-center md:justify-end md:inset-y-0 md:right-0">
                    @auth
                        <ul class="nav navbar-nav navbar-right">
                            <span class="inline-flex rounded-md shadow">
                                <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-blue-600 bg-white hover:text-blue-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-blue-700 transition duration-150 ease-in-out">
                                    {{ __('Dashboard') }}
                                </a>
                            </span>

                            <span class="ml-2 inline-flex rounded-md shadow">
                                <a href="{{ url('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                   class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-blue-600 bg-white hover:text-blue-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-blue-700 transition duration-150 ease-in-out">
                                    {{ __('logout') }}
                                </a>

                                <form id="logout-form" action="{{ url('logout') }}" method="post">
                                    {{ csrf_field() }}
                                </form>
                            </span>
                        </ul>

                    @else

                        <ul class="nav navbar-nav navbar-right">
                            <span class="inline-flex rounded-md shadow">
                                <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-blue-600 bg-white hover:text-blue-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-blue-700 transition duration-150 ease-in-out">
                                    {{ __('Login') }}
                                </a>
                            </span>

                                <span class="ml-2 inline-flex rounded-md shadow">
                                <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md bg-blue-600 dark:bg-blue-500 dark:hover:bg-blue-600 text-white hover:bg-blue-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-blue-700 transition duration-150 ease-in-out">
                                    {{ __('Register') }}
                                </a>
                            </span>
                        </ul>

                    @endauth
                </div>
            </nav>
        </div>

    </div>

</div>

{{ $slot }}

</body>
</html>
