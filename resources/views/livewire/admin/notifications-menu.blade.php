<div>
    @can('view_notifications')
        <div x-data="{ isOpen: false }" class="relative">

            <button wire:click="open" @click="isOpen = !isOpen" class="focus:outline-none">

                <a href="#">

                    @if ($unseenCount > 0)
                        <span class="bg-red-500 absolute top-0 left-6 block h-4 w-4 rounded-full ring-2 ring-white text-xs text-white">{{ $unseenCount }}</span>
                    @endif

                    <svg
                        class="size-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0M3.124 7.5A8.969 8.969 0 015.292 3m13.416 0a8.969 8.969 0 012.168 4.5"
                        />
                    </svg>
                </a>
            </button>

            <div x-show="isOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform translate-x-full"
             x-transition:enter-end="opacity-100 transform translate-x-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 transform translate-x-0"
             x-transition:leave-end="opacity-0 transform translate-x-full"
             class="fixed z-50 inset-0 overflow-hidden"
             aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
                <div class="absolute inset-0 overflow-hidden bg-gray-500/75 transition-opacity">

                    <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex sm:pl-16">

                        <div class="w-screen max-w-md">
                            <div
                                class="h-full flex flex-col bg-white dark:bg-gray-800 dark:text-gray-300 shadow-xl overflow-y-scroll">

                                <div class="p-6">
                                    <div class="flex items-start justify-between">
                                        <h2 class="text-lg mb-0 font-medium text-gray-900 dark:text-gray-300">{{ __('Notifications') }}</h2>
                                        <div class="ml-3 flex items-center">
                                            <button @click="isOpen = !isOpen"
                                                    class="rounded-md text-gray-400 hover:text-gray-500 focus:ring-2 focus:ring-indigo-500">
                                                <span class="sr-only">{{ __('Close panel') }}</span>
                                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="border-b border-gray-200"></div>

                                <ul class="flex-1 divide-y divide-gray-200 overflow-y-auto">

                                    @if (count($notifications) === 0)
                                        <li class="p-6">{{ __('No notifications yet.') }}</li>
                                    @else
                                        @foreach($notifications as $notification)
                                            <li wire:key="{{ $notification->id }}" class="px-6 py-5 relative">
                                                <div class="group flex justify-between items-center">
                                                    @if (!empty($notification->link))
                                                        <x-a href="{{ $notification->link }}" class="-m-1 p-1 block">
                                                            @endif

                                                            <div
                                                                class="absolute inset-0 group-hover:bg-gray-50 dark:group-hover:bg-gray-500"
                                                                aria-hidden="true"></div>

                                                            <div class="flex-1 flex items-center min-w-0 relative">

                                                        <span class="flex-shrink-0 inline-block relative">
                                                            @if (!empty($notification->assignedFrom->image))
                                                                <img class="h-10 w-10 rounded-full"
                                                                     src="{{ storage_url($notification->assignedFrom->image) }}"
                                                                     alt="{{ $notification->assignedFrom->name }}">
                                                            @endif
                                                        </span>

                                                                <div class="ml-4">
                                                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-200">{{ $notification->title }}</p>
                                                                    <p class="text-sm text-gray-500 dark:text-gray-200">{{ $notification->created_at->diffForHumans() }}</p>
                                                                </div>
                                                            </div>
                                                            @if (!empty($notification->link))
                                                        </x-a>
                                                    @endif
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endcan
</div>
