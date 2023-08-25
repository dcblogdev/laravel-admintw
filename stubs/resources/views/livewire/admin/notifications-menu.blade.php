<div x-data="{ isOpen: false }">
    @can('view_notifications')

        <button wire:click="open" @click="isOpen = !isOpen" class="focus:outline-none pt-2">
            <div class="relative">
                @if ($unseenCount > 0)
                    <span class="bg-red-500 absolute top-0 left-4 block h-4 w-4 rounded-full ring-2 ring-white text-xs text-white" aria-hidden="true">{{ $unseenCount }}</span>
                @endif

                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
            </div>
        </button>

        <div x-show.transition="isOpen" class="fixed z-50 inset-0 overflow-hidden" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
            <div class="absolute inset-0 overflow-hidden bg-gray-500 bg-opacity-75 transition-opacity">

                <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex sm:pl-16">

                    <div class="w-screen max-w-md">
                        <div class="h-full flex flex-col bg-white dark:bg-gray-700 dark:text-gray-300 shadow-xl overflow-y-scroll">

                            <div class="p-6">
                                <div class="flex items-start justify-between">
                                    <h2 class="text-lg mb-0 font-medium text-gray-900 dark:text-gray-300">{{ __('Notifications') }}</h2>
                                    <div class="ml-3 flex items-center">
                                        <button @click="isOpen = !isOpen" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:ring-2 focus:ring-indigo-500">
                                            <span class="sr-only">{{ __('Close panel') }}</span>
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
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
                                    <li class="px-6 py-5 relative">
                                        <div class="group flex justify-between items-center">
                                            @if (!empty($notification->link))
                                                <a wire:navigate href="{{ $notification->link }}" class="-m-1 p-1 block">
                                            @endif

                                                <div class="absolute inset-0 group-hover:bg-gray-50 dark:group-hover:bg-gray-500" aria-hidden="true"></div>

                                                <div class="flex-1 flex items-center min-w-0 relative">

                                                    <span class="flex-shrink-0 inline-block relative">
                                                        @if (!empty($notification->assignedFrom->image))
                                                            <img class="h-10 w-10 rounded-full" src="{{ storage_url($notification->assignedFrom->image) }}" alt="{{ $notification->assignedFrom->name }}">
                                                        @endif
                                                    </span>

                                                    <div class="ml-4">
                                                        <p class="text-sm font-medium text-gray-900 dark:text-gray-200">{{ $notification->title }}</p>
                                                        <p class="text-sm text-gray-500 dark:text-gray-200">{{ $notification->created_at->diffForHumans() }}</p>
                                                    </div>
                                                </div>
                                            @if (!empty($notification->link))
                                                </a>
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

    @endcan
</div>
