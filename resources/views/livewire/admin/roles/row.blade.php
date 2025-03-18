<tr>
    <td>{{ $role->label }}</td>
    <td>
        <div class="flex space-x-2">

            @can('edit_roles')
                <x-a href="{{ route('admin.settings.roles.edit', ['role' => $role->id]) }}">{{ __('Edit') }}</x-a>
            @endcan

            @if ($role->name !== 'admin')
                @can('delete_roles')
                    <div x-data="{ confirmation: '' }">
                        <x-modal>
                            <x-slot name="trigger">
                                <a href="#" @click="on = true">{{ __('Delete') }}</a>
                            </x-slot>

                            <x-slot name="modalTitle">
                                <div class="pt-5">
                                    {{ __('Are you sure you want to delete') }}: <b>{{ $role->label }}</b>
                                </div>
                            </x-slot>

                            <x-slot name="content">
                                <label class="flex flex-col gap-2">
                                    <div>{{ __('Type') }} <span class="font-bold">"{{ $role->label }}"</span> {{ __('to confirm') }}</div>
                                    <input autofocus x-model="confirmation" class="px-3 py-2 border border-slate-300 rounded-lg">
                                </label>
                            </x-slot>

                            <x-slot name="footer">
                                <x-button variant="gray" @click="on = false">{{ __('Cancel') }}</x-button>
                                <x-button variant="red" x-bind:disabled="confirmation !== '{{ $role->label }}'" wire:click="deleteRole('{{ $role->id }}')">{{ __('Delete Role') }}</x-button>
                            </x-slot>
                        </x-modal>
                        </div>
                @endcan
            @endif
        </div>
    </td>
</tr>
