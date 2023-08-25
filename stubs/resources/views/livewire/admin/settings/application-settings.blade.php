<div>

    <div class="card">

        <h3 class="mb-4">{{ __('Application Settings') }}</h3>

        <x-form wire:submit="update" method="put">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <x-form.input wire:model="siteName" name="siteName" :label="__('Site Name')" />

                <fieldset>

                    <div class="mt-1 bg-white dark:bg-gray-500 dark:text-gray-200 rounded-md shadow-sm -space-y-px">

                        <div class="relative border rounded-tl-md rounded-tr-md p-4 flex border-gray-200">
                            <div class="flex items-center h-5">
                                <input wire:model="isForced2Fa" id="isForced2Fa" type="checkbox" class="h-4 w-4 text-light-blue-600 cursor-pointer focus:ring-light-blue-500 border-gray-300">
                            </div>
                            <label for="isOfficeLoginOnly" class="ml-3 flex flex-col cursor-pointer">
                                <span class="block text-sm font-medium text-gray-900 dark:text-gray-300">
                                    {{ __('Enforce 2Fa') }}
                                </span>
                                <span class="block text-sm text-gray-500 dark:text-gray-200">
                                    {{ __('Force 2 factor authentication for all users on login.') }}
                                    {{ __('Users can only login at pre-approved IP addresses.') }}
                                </span>
                            </label>
                        </div>

                    </div>
                </fieldset>

            </div>

            <x-button>{{ __('Update Application Settings') }}</x-button>

        </x-form>

        @include('errors.messages')

    </div>
</div>