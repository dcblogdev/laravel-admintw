<div>
    <x-2col>
        <x-slot name="left">
            <h3>{{ __('Admin Settings') }}</h3>
        </x-slot>
        <x-slot name="right">
            <div class="card">

                <x-form wire:submit="update" method="put">

                    <fieldset>

                        <div class="mt-1 bg-white dark:bg-gray-500 dark:text-gray-200 rounded-md shadow-sm -space-y-px">

                            <div class="relative border rounded-tl-md rounded-tr-md p-4 flex border-gray-200">
                                <div class="flex items-center h-5">
                                    <input wire:model="isOfficeLoginOnly" id="isOfficeLoginOnly" type="checkbox" class="h-4 w-4 text-light-blue-600 cursor-pointer focus:ring-light-blue-500 border-gray-300 rounded-md">
                                </div>
                                <label for="isOfficeLoginOnly" class="ml-3 flex flex-col cursor-pointer">
                                    <span class="block text-sm font-medium text-gray-900 dark:text-gray-300">
                                        {{ __('Office Login Only') }}
                                    </span>
                                    <span class="block text-sm text-gray-500 dark:text-gray-200">
                                        {{ __('When active user can only login at pre-approved IP addresses set in') }} <a href="{{ route('admin.settings') }}">{{ __('System Settings') }}</a>.
                                    </span>
                                </label>
                            </div>

                            @if ($user->id !== auth()->id())
                                <div class="relative border rounded-tl-md rounded-tr-md p-4 flex border-gray-200">
                                    <div class="flex items-center h-5">
                                        <input wire:model="isActive" id="isActive" type="checkbox" class="h-4 w-4 text-light-blue-600 cursor-pointer focus:ring-light-blue-500 border-gray-300" checked="">
                                    </div>
                                    <label for="isActive" class="ml-3 flex flex-col cursor-pointer">
                                        <span class="block text-sm font-medium text-gray-900 dark:text-gray-300">
                                            {{ __('Account Active') }}
                                        </span>
                                        <span class="block text-sm text-gray-500 dark:text-gray-200">
                                            {{ __('Only active users can login') }}.
                                        </span>
                                    </label>
                                </div>
                            @endif

                        </div>
                    </fieldset>

                    <div class="mt-5">
                        <x-button>{{ __('Update Settings') }}</x-button>
                    </div>

                    @include('errors.messages')

                </x-form>
            </div>

        </x-slot>
    </x-2col>
</div>
