@props(['title' => ''])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@if($title !== '') {{ $title }} - @endif {{ config('app.name', 'Laravel') }}</title>
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

        <div class="pt-2 pr-2">
           <x-dropdown>
               <x-slot name="trigger">
                   <button class="focus:outline-none">
                       <div class="flex">
                           {{ auth()->user()->name }}

                           <svg x-show="!open" class="ml-auto mt-1 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>

                            <svg x-show="open" class="ml-auto mt-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                            </svg>
                       </div>
                   </button>
               </x-slot>
               <x-slot name="content">
                   <x-dropdown-link :href="route('app.users.edit')">Edit Account</x-dropdown-link>
                   <form method="POST" action="{{ route('logout') }}">
                       @csrf
                       <x-dropdown-link href="#" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</x-dropdown-link>
                   </form>
               </x-slot>
           </x-dropdown>
        </div>

    </div>

    <div class="flex min-h-screen">

        <!-- regular sidebar -->
        <div class="hidden flex-none w-full md:block md:w-56 bg-gray-800">
            @include('layouts.navigation')
        </div>

        <!--sidebar on mobile-->
        <div x-show.transition.origin.top.left="sidebarOpen" class="min-w-full bg-gray-800 md:hidden">
            @include('layouts.navigation')
        </div>

        <!-- main content -->
        <div class="w-full bg-gray-200 dark:bg-gray-600 p-5">
            {{ $slot }}
        </div>

    </div>

    <div class="bg-white dark:bg-gray-900 dark:text-gray-300 p-5 flex justify-between text-xs">
        <div>{{ __('Copyright') }} &copy; {{ date('Y') }} {{ config('app.name') }}</div>
    </div>

</div>

<livewire:scripts />
</body>
</html>