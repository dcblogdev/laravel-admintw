@auth
<div class="relative inline-block">
      <!-- Dropdown Toggle Button -->
      <button
        x-on:click="userDropdownOpen = true"
        x-bind:aria-expanded="userDropdownOpen"
        type="button"
        id="tk-dropdown-layouts-user"
        class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700"
        aria-haspopup="true"
      >
        <svg
          class="hi-mini hi-user-circle inline-block size-5 sm:hidden"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 20 20"
          fill="currentColor"
          aria-hidden="true"
        >
          <path
            fill-rule="evenodd"
            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-5.5-2.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zM10 12a5.99 5.99 0 00-4.793 2.39A6.483 6.483 0 0010 16.5a6.483 6.483 0 004.793-2.11A5.99 5.99 0 0010 12z"
            clip-rule="evenodd"
          />
        </svg>
        <span class="hidden sm:inline">
            {{ auth()->user()->name }}
        </span>
        <svg
          class="hi-mini hi-chevron-down hidden size-5 opacity-40 sm:inline-block"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 20 20"
          fill="currentColor"
          aria-hidden="true"
        >
          <path
            fill-rule="evenodd"
            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
            clip-rule="evenodd"
          />
        </svg>
      </button>
      <!-- END Dropdown Toggle Button -->

      <!-- Dropdown -->
      <div
        x-cloak
        x-trap="userDropdownOpen"
        x-show="userDropdownOpen"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        x-on:click.outside="userDropdownOpen = false"
        x-on:keydown.down.prevent="$focus.next()"
        x-on:keydown.up.prevent="$focus.prev()"
        x-on:keydown.home.prevent="$focus.first()"
        x-on:keydown.end.prevent="$focus.last()"
        x-on:keydown.escape.window="userDropdownOpen = false"
        role="menu"
        aria-labelledby="tk-dropdown-layouts-user"
        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-lg shadow-xl dark:shadow-gray-900"
      >
        <div
          class="divide-y divide-gray-100 rounded-lg bg-white ring-1 ring-black/5 dark:divide-gray-700 dark:bg-gray-800 dark:ring-gray-700"
        >
          <div class="space-y-1 p-2.5">
              @can('view_users_profiles')
                  <x-dropdown.link :href="route('admin.users.show', auth()->user())">
                      <div class="flex gap-2.5">
                          <x-heroicon-s-eye class="size-5" />
                          {{ __('View Profile') }}
                      </div>
                  </x-dropdown.link>
              @endcan

              @can('edit_own_account')
                  <x-dropdown.link :href="route('admin.users.edit', auth()->user())">
                      <div class="flex gap-2.5">
                          <x-heroicon-s-pencil class="size-5" />
                          {{ __('Edit Account') }}
                      </div>
                  </x-dropdown.link>
              @endcan

              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex gap-2.5 px-4 py-2 text-sm text-gray-700 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-400">
                <x-heroicon-s-lock-closed class="size-5" />
                {{ __('Log out') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="post">
                {{ csrf_field() }}
              </form>

          </div>

        </div>
      </div>
      <!-- END Dropdown -->
</div>
@endauth
