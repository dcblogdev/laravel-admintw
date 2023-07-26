<div>
   <p>
       <a wire:navigate href="{{ route('admin.users.index') }}">{{ __('Users') }}</a>
       <span class="dark:text-gray-200">- {{ $user->name }}</span>
   </p>

    <div class="grid grid-cols-1 lg:grid-cols-4 lg:gap-6">
        <div>
            <div class="card">

                <div class="text-center">
                    @if (storage_exists($user->image))
                        <img class="mx-auto h-20 w-20 rounded-full" src="{{ storage_url($user->image) }}" alt="">
                    @endif
                    <h2 class="mb-0">{{ $user->name }}</h2>

                    @if(can('edit_users'))
                        <p><a wire:navigate class="btn btn-primary" href="{{ route('admin.users.edit', $user) }}">{{ __('Edit') }}</a></p>
                    @elseif(auth()->id() === $user->id && can('edit_own_account'))
                        <p><a wire:navigate class="btn btn-primary" href="{{ route('admin.users.edit', $user) }}">{{ __('Edit') }}</a></p>
                    @endif

                </div>

                <div class="mt-5 text-left">
                    <div class="flex border-b pb-2">
                        <i class="pt-1 pr-1 fa fa-envelope"></i>
                        <div style="width:200px; overflow: scroll">{{ $user->email }}</div>
                    </div>
                </div>

           </div>
        </div>

        <div class="lg:col-span-3">
            @if (can('view_users_activity'))
                <livewire:admin.users.activity :user="$user"/>
            @endif
        </div>
    </div>

</div>
