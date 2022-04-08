@section('title', 'Sent Emails')
<div>
    <div class="flex justify-between">

        <h1>Sent Emails</h1>

        @include('errors.messages')

    </div>

    <div class="mt-5 grid sm:grid-cols-1 md:grid-cols-3 gap-4">

        <div class="col-span-2">
            <x-form.input type="search" id="to" name="to" wire:model="to" label="none" placeholder="Search To emails">
                {{ old('to', request('to')) }}
            </x-form.input>
        </div>

    </div>

    <div class="mb-5" x-data="{ isOpen: @if($openFilter || request('openFilter')) true @else false @endif }">

        <button type="button" @click="isOpen = !isOpen" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded-t text-grey-700 bg-gray-200 hover:bg-grey-300 dark:bg-gray-700 dark:text-gray-200 transition ease-in-out duration-150">
            <svg class="h-5 w-5 text-gray-500 dark:text-gray-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            Advanced Search
        </button>

        <a href="{{ route('admin.settings.sent-emails') }}" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-grey-700 bg-gray-200 hover:bg-grey-300 dark:bg-gray-700 dark:text-gray-200 transition ease-in-out duration-150">
            <svg class="h-5 w-5 text-gray-500 dark:text-gray-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
            </svg>
            Reset form
        </a>

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

                <x-form.input type="email" id="cc" name="cc" label="CC" wire:model="cc">
                    {{ old('cc', request('cc')) }}
                </x-form.input>

                <x-form.input type="email" id="bcc" name="bcc" label="BCC" wire:model="bcc">
                    {{ old('bcc', request('bcc')) }}
                </x-form.input>

                <x-form.input type="text" id="subject" name="subject" label="Subject" wire:model="subject">
                    {{ old('subject', request('subject')) }}
                </x-form.input>

                <x-form.daterange id="created_at" name="created_at" label="Created Date Range" wire:model.lazy="created_at">
                    {{ old('created_at', request('created_at')) }}
                </x-form.daterange>

            </div>
        </div>

    </div>

    <main class="flex-1 flex bg-gray-200">

        <div class="relative flex flex-col w-full max-w-xs flex-grow border-l border-r bg-gray-200">
            <div class="flex-1 overflow-y-auto">
                @foreach($this->emails() as $email)

                    <a href="#" wire:click="view({{ $email->id }})" class="block px-6 pt-3 pb-4 bg-white border-t emailitem">
                        <div class="flex justify-between">
                            <span class="text-sm font-semibold text-gray-900">{{ $email->to }}</span>
                            <span class="text-sm text-gray-500">{{ $email->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-sm text-gray-900">{{ $email->subject }}</p>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="flex-1 flex flex-col w-0">
            @include('livewire.admin.sent-emails.view')
        </div>

    </main>

    {{ $this->emails()->links() }}


</div>
