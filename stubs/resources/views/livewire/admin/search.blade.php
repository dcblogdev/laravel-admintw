<div>
    @can('view_search')
        <form action="#" method="get" class="m-0">
        <div class="w-56 md:w-96 rounded-md">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-2">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input wire:model.live="query" type="search" class="w-full py-2 rounded-md pl-10 bg-white dark:bg-gray-700 dark:text-gray-300 focus:outline-none" placeholder="{{__('Search') }}">
            </div>
        </div>

        @if (strlen($query) > 2)
            <ul class="absolute z-50 bg-white dark:bg-gray-500 dark:text-gray-200 border border-gray-300 dark:border-gray-400 w-96 rounded-md mt-2 text-gray-700 text-sm divide-y divide-gray-200">

                @foreach($searchResults as $result)
                        <li class="p-1">
                            <a wire:navigate href="{{ $result['route'] }}" class="flex items-center px-4 py-4 hover:bg-gray-200 dark:hover:bg-gray-600 transition ease-in-out duration-150">{{ $result['section'] }}: {{ $result['label'] }}</a>
                        </li>
                @endforeach

                @if (count($searchResults) === 0)
                        <li class="p-1">{{ __('No results') }}</li>
                @endif
            </ul>
        @endif

    </form>
    @endcan
</div>
