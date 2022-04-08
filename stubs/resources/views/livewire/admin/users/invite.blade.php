<div>
    @if (can('add_users'))
        <x-modal>
        <x-slot name="trigger">
            <button class="btn btn-primary" @click="on = true">Invite User</button>
        </x-slot>

        <x-slot name="title">Invite User</x-slot>

        <x-slot name="content">

            @include('errors.success')

            <x-form.input tabindex="1" wire:model="name" label="Name" name="name" required></x-form.input>
            <x-form.input tabindex="3" wire:model="email" label="Email" name="email" required></x-form.input>

            <h4>Roles</h4>

            @error('rolesSelected')
                <p class="error">{{ $message }}</p>
            @enderror

            @foreach($roles as $role)
                <p><x-form.checkbox wire:model="rolesSelected" :label="$role->label" :wire:key="$role->id" value="{{ $role->id }}" />
            @endforeach

        </x-slot>

        <x-slot name="footer">
            <button @click="on = false">Close</button>
            <button class="btn btn-primary" wire:click="store">Send invite to user</button>
        </x-slot>

    </x-modal>
    @endif
</div>
