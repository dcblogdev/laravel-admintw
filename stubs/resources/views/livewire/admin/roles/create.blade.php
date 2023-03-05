<div>
    <x-modal>
        <x-slot name="trigger">
            <button class="btn btn-primary" @click="on = true">{{ __('Add Role') }}</button>
        </x-slot>

        <x-slot name="title">{{ __('Add Role') }}</x-slot>

        <x-slot name="content">
            <x-form.input wire:model="role" :label="__('Role')" name="role" required />
        </x-slot>

        <x-slot name="footer">
            <button class="btn" @click="on = false">{{ __('Cancel') }}</button>
            <button class="btn btn-primary" wire:click="store">{{ __('Create Role') }}</button>
        </x-slot>

    </x-modal>
</div>
