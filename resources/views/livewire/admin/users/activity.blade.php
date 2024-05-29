<div>
    <div class="card">
        <h1>{{ __('Activity') }}</h1>

        <div class="mb-5 grid sm:grid-cols-1 md:grid-cols-3 gap-4">

            <div class="col-span-2">
                <x-form.input type="search" id="title" name="title" wire:model.live="title" label="none" :placeholder="__('Search Actions')" />
            </div>

        </div>

        <div class="mb-5" x-data="{ isOpen: @if($openFilter || request('openFilter')) true @else false @endif }">

            <button type="button" @click="isOpen = !isOpen"
                    class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded-t text-grey-700 bg-gray-200 hover:bg-grey-300 dark:bg-gray-700 dark:text-gray-200 transition ease-in-out duration-150">
                <svg class="h-5 w-5 text-gray-500 dark:text-gray-200" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                {{ __('Advanced Search') }}
            </button>

            <button type="button" wire:click="resetFilters" @click="isOpen = false"
                    class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-grey-700 bg-gray-200 hover:bg-grey-300 dark:bg-gray-700 dark:text-gray-200 transition ease-in-out duration-150">
                <svg class="h-5 w-5 text-gray-500 dark:text-gray-200" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                {{ __('Reset form') }}
            </button>

            <div
                    x-show="isOpen"
                    x-transition:enter="transition ease-out duration-100 transform"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75 transform"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="bg-gray-200 dark:bg-gray-700 rounded-b-md p-5"
                    wire:ignore.self>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">

                    <x-form.select id="section" name="section" label="Section" wire:model.live="section">
                        <option value="">{{ __('Select') }}</option>
                        @foreach($sections as $section)
                            <option value="{{ $section }}">{{ $section }}</option>
                        @endforeach
                    </x-form.select>

                    <x-form.select id="type" name="type" label="Type" wire:model.live="type">
                        <option value="">{{ __('Select') }}</option>
                        @foreach($types as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </x-form.select>

                    <x-form.daterange id="created_at" name="created_at" :label="__('Created Date Range')" wire:model.blur="created_at" />

                </div>
            </div>

        </div>

        <div class="overflow-y-auto">
            <table>
                <thead>
                <tr>
                    <th><a href="#" wire:click="sortBy('title')">{{ __('Action') }}</a></th>
                    <th><a href="#" wire:click="sortBy('section')">{{ __('Section') }}</a></th>
                    <th><a href="#" wire:click="sortBy('type')">{{ __('Type') }}</a></th>
                    <th><a href="#" wire:click="sortBy('link')">{{ __('View') }}</a></th>
                    <th><a href="#" wire:click="sortBy('created_at')">{{ __('Created At') }}</a></th>
                </tr>
                </thead>
                <tbody>
                @foreach($this->userlogs() as $log)
                    <tr wire:key="{{ $log->id }}">
                        <td>{{ $log->title }}</td>
                        <td>{{ $log->section }}</td>
                        <td>{{ $log->type }}</td>
                        <td>
                            @if ($log->link !== null)
                                <x-a href="{{ url($log->link) }}">{{ __('View') }}</x-a>
                            @endif
                        </td>
                        <td>{{ $log->created_at !=='' ? date('jS M Y H:i:s', strtotime($log->created_at)) : '' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{ $this->userlogs()->links() }}

    </div>
</div>
