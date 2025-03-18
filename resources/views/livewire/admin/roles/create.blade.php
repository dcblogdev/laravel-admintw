<x-modal>
    <x-slot name="trigger">
        <x-button @click="on = true">{{ __('Add Role') }}</x-button>
    </x-slot>

    <x-slot name="modalTitle">{{ __('Add Role') }}</x-slot>

    <x-slot name="content">

        @include('errors.success')

        <x-form.input autofocus wire:model="label" :label="__('Role')" name="label" required />

    </x-slot>

    <x-slot name="footer">
        <x-button variant="gray" @click="on = false">{{ __('Close') }}</x-button>
        <x-button wire:click="store">{{ __('Create Role') }}</x-button>
    </x-slot>

</x-modal>
