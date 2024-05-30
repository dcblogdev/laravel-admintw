<x-modal>
    <x-slot name="trigger">
        <x-button @click="on = true">{{ __('Add Role') }}</x-button>
    </x-slot>

    <x-slot name="modalTitle">{{ __('Add Role') }}</x-slot>

    <x-slot name="content">
        <x-form.input wire:model="role" :label="__('Role')" name="role" required />
    </x-slot>

    <x-slot name="footer">
        <button class="btn" @click="on = false">{{ __('Cancel') }}</button>
        <x-button wire:click="store">{{ __('Create Role') }}</x-button>
    </x-slot>

</x-modal>
