<div>
    <div class="flex justify-between">

        <h1>{{ __('Roles') }}</h1>

        <div>
            @can('add_roles')
                <livewire:admin.roles.create @added="$refresh"/>
            @endcan
        </div>

    </div>

    @include('errors.messages')

    <div class="card">

        <div class="alert alert-info py-2 px-4 my-5 rounded-md">
            {{ __('By default only Admin have full access, additional roles will need permissions applying to them by editing the roles below.') }}
        </div>

        <div class="grid sm:grid-cols-1 md:grid-cols-4 gap-4">

            <div class="col-span-2">
                <x-form.input type="search" id="roles" name="name" wire:model.live="name" label="none" :placeholder="__('Search Roles')" />
            </div>

        </div>

        <table>
            <thead>
            <tr>
                <th>
                    <a class="link" href="#" wire:click.prevent="sortBy('name')">{{ __('Name') }}</a>
                </th>
                <th>
                {{ __('Action') }}
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($this->roles() as $role)
            <tr wire:key="{{ $role->id }}">
                <td>{{ $role->label }}</td>
                    <td>
                        <div class="flex space-x-2">

                            @can('edit_roles')
                                <a href="{{ route('admin.settings.roles.edit', ['role' => $role->id]) }}">{{ __('Edit') }}</a>
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

                                                <label class="flex flex-col gap-2">
                                                    {{ __('Type') }} "{{ $role->name }}" {{ __('to confirm') }}
                                                    <input x-model="confirmation" class="px-3 py-2 border border-slate-300 rounded-lg" placeholder="CONFIRM">
                                                </label>

                                                <x-dialog.footer>
                                                    <x-dialog.close>
                                                        <button type="button" class="btn mr-5">{{ __('Cancel') }}</button>
                                                    </x-dialog.close>

                                                    <x-dialog.close>
                                                        <button :disabled="confirmation !== '{{ $role->name }}'" wire:click="deleteRole('{{ $role->id }}')" type="button" class="btn btn-red text-center disabled:cursor-not-allowed disabled:opacity-50">{{ __('Delete Role') }}</button>
                                                    </x-dialog.close>
                                                </x-dialog.footer>
                                            </div>

                                        </x-dialog.panel>

                                     </x-dialog>
                                @endcan
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $this->roles()->links() }}

    </div>

</div>
