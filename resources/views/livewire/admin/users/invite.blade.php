<div>
    <x-modal>
        <x-slot name="trigger">
            <button class="btn btn-primary" @click="on = true">{{ __('Invite User') }}</button>
        </x-slot>

        <x-slot name="modalTitle">{{ __('Invite User') }}</x-slot>

        <x-slot name="content">

            @include('errors.success')

            <x-form.input tabindex="1" wire:model="name" :label="__('Name')" name="name" required />
            <x-form.input tabindex="3" wire:model="email" :label="__('Email')" name="email" required />

            <p class="font-bold">{{ __('Roles') }}</p>

            @error('rolesSelected')
                <p class="error">{{ $message }}</p>
            @enderror

            @foreach($roles as $role)
                <x-form.checkbox
                    wire:model="rolesSelected"
                    id="{{ $role->id }}"
                    value="{{ $role->id }}"
                    label="{{ $role->label }}"
                />
            @endforeach

        </x-slot>

        <x-slot name="footer">
            <button @click="on = false">{{ __('Close') }}</button>
            <button class="btn btn-primary" wire:click="store">{{ __('Send invite to user') }}</button>
        </x-slot>

    </x-modal>
</div>
