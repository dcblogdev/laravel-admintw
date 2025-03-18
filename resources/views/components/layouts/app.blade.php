<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') {{ $title ?? null }} - {{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div
  x-data="{ userDropdownOpen: false, mobileSidebarOpen: false, desktopSidebarOpen: true }"
  x-bind:class="{
    'lg:pl-64': desktopSidebarOpen
  }"
  id="page-container"
  class="mx-auto flex min-h-dvh w-full min-w-80 flex-col bg-gray-100 lg:pl-64 dark:bg-gray-900 dark:text-gray-100"
>

  <nav
    x-bind:class="{
      '-translate-x-full': !mobileSidebarOpen,
      'translate-x-0': mobileSidebarOpen,
      'lg:-translate-x-full': !desktopSidebarOpen,
      'lg:translate-x-0': desktopSidebarOpen,
    }"
    id="page-sidebar"
    class="fixed top-0 bottom-0 left-0 z-50 flex h-full w-full -translate-x-full flex-col border-r border-gray-200 bg-white transition-transform duration-500 ease-out lg:w-64 lg:translate-x-0 dark:border-gray-800 dark:bg-gray-800 dark:text-gray-200"
    aria-label="Main Sidebar Navigation"
  >

    <div class="flex h-16 w-full flex-none items-center justify-between px-4 lg:justify-center dark:bg-gray-600/25">

      <x-a href="{{ route('dashboard') }}" class="group inline-flex items-center gap-2 text-lg font-bold tracking-wide text-gray-900 hover:text-gray-600 dark:text-gray-100 dark:hover:text-gray-300">
        <span>{{ config('app.name') }}</span>
      </x-a>

      <div class="lg:hidden">
        <button
          x-on:click="mobileSidebarOpen = false"
          type="button"
          class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700"
        >
          <svg
            class="hi-mini hi-x-mark -mx-0.5 inline-block size-5"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            fill="currentColor"
            aria-hidden="true"
          >
            <path
              d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z"
            />
          </svg>
        </button>
      </div>

    </div>

    <div class="overflow-y-auto">
      <div class="w-full p-4">
        <nav class="space-y-1">
            @include('components.layouts.app.navigation')
        </nav>
      </div>
    </div>

  </nav>


  <header
    x-bind:class="{
      'lg:pl-64': true
    }"
    id="page-header"
    class="fixed top-0 right-0 left-0 z-30 flex h-16 flex-none items-center bg-white shadow-xs lg:pl-64 dark:bg-gray-800"
  >
    <div class="mx-auto flex w-full max-w-10xl justify-between px-4 lg:px-8">

      <div class="flex items-center gap-2">

        <div class="lg:hidden">
          <button
            x-on:click="mobileSidebarOpen = !mobileSidebarOpen"
            type="button"
            class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700"
          >
            <svg
              class="hi-solid hi-menu-alt-1 inline-block size-5"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                clip-rule="evenodd"
              />
            </svg>
          </button>
        </div>

      </div>

      <div class="flex items-center gap-3">
          <button id="theme-toggle">
              <x-heroicon-o-sun id="theme-toggle-light" class="size-5 -mt-1 text-yellow-500" />
              <x-heroicon-o-moon id="theme-toggle-dark" class="size-5 -mt-1 text-gray-900 dark:text-white" />
          </button>
          <livewire:admin.notifications-menu/>
          <livewire:admin.help-menu/>
          <livewire:admin.users.user-menu/>
      </div>
    </div>
  </header>

  <main id="page-content" class="flex max-w-full flex-auto flex-col pt-16">
    <div class="mx-auto w-full max-w-10xl p-4 lg:p-8">
        {{ $slot ?? '' }}
    </div>
  </main>

  <footer
    id="page-footer"
    class="flex flex-none items-center bg-white dark:bg-gray-800/50"
  >
    <div
      class="mx-auto flex w-full max-w-10xl flex-col px-4 text-center text-sm md:flex-row md:justify-between md:text-left lg:px-8"
    >
      <div class="pt-4 pb-1 md:pb-4">
        {{ __('Copyright') }} &copy; {{ date('Y') }} {{ config('app.name') }}
      </div>
      <div class="inline-flex items-center justify-center pt-1 pb-4 md:pt-4">
        <span>
            {{ __('Built by') }} <a href="https://dcblog.dev" target="_blank" class="font-medium text-blue-600 hover:text-blue-400 dark:text-blue-400 dark:hover:text-blue-300">David Carr</a>
        </span>
      </div>
    </div>
  </footer>
</div>

</body>
</html>
