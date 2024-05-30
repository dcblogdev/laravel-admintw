<x-dialog wire:model="showDialog">
    <x-dialog.open>
        <x-button type="button">{{ __('Add Role') }}</x-button>
    </x-dialog.open>

    <x-dialog.panel>

        <h1 class="text-center text-xl pb-5">{{ __('Add Role') }}</h1>

        <x-form.input autofocus wire:model="label" :label="__('Role')" name="label" required />

        <x-dialog.footer>
            <x-dialog.close>
                <button class="btn">{{ __('Cancel') }}</button>
            </x-dialog.close>

            <x-button wire:click="store">{{ __('Create Role') }}</x-button>

        </x-dialog.footer>

    </x-dialog.panel>

</x-dialog>
