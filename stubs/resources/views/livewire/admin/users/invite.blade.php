<div>
    <x-modal>
        <x-slot name="trigger">
            <button class="btn btn-primary" @click="on = true">{{ __('Invite User') }}</button>
        </x-slot>

        <x-slot name="title">{{ __('Invite User') }}</x-slot>

        <x-slot name="content">

            @include('errors.success')

            <x-form.input tabindex="1" wire:model="name" :label="__('Name')" name="name" required />
            <x-form.input tabindex="3" wire:model="email" :label="__('Email')" name="email" required />

            <h4>{{ __('Roles') }}</h4>

            @error('rolesSelected')
                <p class="error">{{ $message }}</p>
            @enderror

            @foreach($roles as $role)
                <p><x-form.checkbox wire:model="rolesSelected" :label="$role->label" :wire:key="$role->name" value="{{ $role->name }}" />
            @endforeach

        </x-slot>

        <x-slot name="footer">
            <button @click="on = false">{{ __('Close') }}</button>
            <button class="btn btn-primary" wire:click="store">{{ __('Send invite to user') }}</button>
        </x-slot>

    </x-modal>
</div>
