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
                        <x-form.checkbox
                            wire:model="roleSelections"
                            id="{{ $role->id }}"
                            value="{{ $role->id }}"
                            label="{{ $role->label }}"
                        />
                    @endforeach

                    <div class="mt-5">
                        <x-button>{{ __('Update Roles') }}</x-button>
                    </div>

                    @include('errors.messages')

                </x-form>
            </div>

        </x-slot>
    </x-2col>

</div>
