<div>
    <x-2col>
        <x-slot name="left">
            <h3>{{ __('Roles') }}</h3>
            <p>{{ __('Turn roles on and off, disabled roles will disable the users permissions.') }}</p>
        </x-slot>
        <x-slot name="right">

            <div class="card">
                <x-form wire:submit="update" method="put">

                    @foreach($roles as $role)
                        <p><input type="checkbox" wire:model="roleSelections" value="{{ $role->id }}"> {{ $role->label }}</p>
                    @endforeach

                    <x-button class="mt-5">{{ __('Update Roles') }}</x-button>

                    @include('errors.messages')

                </x-form>
            </div>

        </x-slot>
    </x-2col>

</div>