<tr>
    <td>{{ $role->label }}</td>
    <td>
        <div class="flex space-x-2">

            <x-menu>
                <x-menu.open>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                </x-menu.open>

                <x-menu.items>

                    @can('edit_roles')
                        <x-menu.item>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                <path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                                <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                            </svg>
                            <a href="{{ route('admin.settings.roles.edit', ['role' => $role->id]) }}">{{ __('Edit') }}</a>
                        </x-menu.item>
                    @endcan

                    @if ($role->name !== 'admin')
                        @can('delete_roles')

                            <x-dialog>
                                <x-dialog.open>
                                    <x-menu.item>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                            <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd" />
                                        </svg>
                                        <a class="link" href="#">{{ __('Delete') }}</a>
                                    </x-menu.item>
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

                </x-menu.items>

            </x-menu>

        </div>
    </td>
</tr>
