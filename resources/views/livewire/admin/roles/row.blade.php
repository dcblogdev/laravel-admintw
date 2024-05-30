<tr>
    <td>{{ $role->label }}</td>
    <td>
        <div class="flex space-x-2">

            @can('edit_roles')
                <x-a href="{{ route('admin.settings.roles.edit', ['role' => $role->id]) }}">{{ __('Edit') }}</x-a>
            @endcan

            @if ($role->name !== 'admin')
                @can('delete_roles')

                    <x-dialog>
                        <x-dialog.open>
                            <a class="link" href="#">{{ __('Delete') }}</a>
                        </x-dialog.open>

                        <x-dialog.panel>

                            <div class="flex flex-col gap-6" x-data="{ confirmation: '' }">
                                <h2 class="font-semibold text-3xl">{{ __('Are you sure you want to delete this role?') }}</h2>

                                <form wire:submit="$dispatch('delete')">

                                    <label class="flex flex-col gap-2">
                                        {{ __('Type') }} "{{ $role->label }}" {{ __('to confirm') }}
                                        <input autofocus x-model="confirmation" class="px-3 py-2 border border-slate-300 rounded-lg" placeholder="CONFIRM">
                                    </label>

                                    <x-dialog.footer>
                                        <x-dialog.close>
                                            <button type="button" class="btn mr-5">{{ __('Cancel') }}</button>
                                        </x-dialog.close>

                                        <x-dialog.close>
                                            <button type="submit" :disabled="confirmation !== '{{ $role->label }}'" class="btn btn-red text-center disabled:cursor-not-allowed disabled:opacity-50">{{ __('Delete Role') }}</button>
                                        </x-dialog.close>
                                    </x-dialog.footer>

                                </form>
                            </div>

                        </x-dialog.panel>

                     </x-dialog>
                @endcan
            @endif
        </div>
    </td>
</tr>
