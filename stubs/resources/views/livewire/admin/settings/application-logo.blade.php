<div>
    <div class="card">

        <h3>{{ __('Application Logo') }}</h3>

        @include('errors.messages')

        <x-form wire:submit="update" method="put">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <h2>{{ __('Light Mode Logo') }}</h2>

                    <div class="mt-1 border-2 border-gray-300 border-dashed rounded-md px-6 pt-5 pb-6 flex justify-center">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <div class="flex text-sm text-center text-gray-600">
                                <label for="applicationLogo" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span>{{ __('Upload a file') }}</span>
                                    <input wire:model="applicationLogo" id="applicationLogo" name="applicationLogo" type="file" class="sr-only">
                                </label>
                            </div>
                            <p class="text-xs text-gray-500">{{ __('PNG, JPG, GIF') }}</p>
                        </div>
                    </div>

                    <div class="bg-gray-400">
                        @if ($applicationLogo)
                            <p>{{ __('Photo Preview') }}:</p>
                            <p><img src="{{ $applicationLogo->temporaryUrl() }}"></p>
                        @elseif(storage_exists($existingApplicationLogo))
                            <p><img src="{{ storage_url($existingApplicationLogo) }}"></p>
                        @endif
                    </div>

                </div>

                <div>
                    <h2>{{ __('Dark Mode Logo') }}</h2>

                    <div class="mt-1 border-2 border-gray-300 border-dashed rounded-md px-6 pt-5 pb-6 flex justify-center">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <div class="flex text-sm text-center text-gray-600">
                                <label for="applicationLogoDark" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span>{{ __('Upload a file') }}</span>
                                    <input wire:model="applicationLogoDark" id="applicationLogoDark" name="applicationLogoDark" type="file" class="sr-only">
                                </label>
                            </div>
                            <p class="text-xs text-gray-500">{{ __('PNG, JPG, GIF') }}</p>
                        </div>
                    </div>

                    <div class="bg-gray-400">
                        @if ($applicationLogoDark)
                            <p>{{ __('Photo Preview') }}:</p>
                            <p><img src="{{ $applicationLogoDark->temporaryUrl() }}"></p>
                        @elseif(storage_exists($existingApplicationLogoDark))
                            <p><img src="{{ storage_url($existingApplicationLogoDark) }}"></p>
                        @endif
                    </div>

                </div>
            </div>

            <x-button>{{ __('Save') }}</x-button>

        </x-form>

    </div>
</div>