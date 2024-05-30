<x-dialog wire:model="showDialog">
    <x-dialog.open>
        <x-button type="button">{{ __('Add Role') }}</x-button>
    </x-dialog.open>

    <x-dialog.panel>

        <form wire:submit="store">
        <h1 class="text-center text-xl pb-5">{{ __('Add Role') }}</h1>

        <x-form.input autofocus wire:model="label" :label="__('Role')" name="label" required />

        <x-dialog.footer>
            <x-dialog.close>
                <button type="button" class="btn">{{ __('Cancel') }}</button>
            </x-dialog.close>

            <x-button>{{ __('Create Role') }}</x-button>

        </x-dialog.footer>

        </form>

    </x-dialog.panel>

</x-dialog>
