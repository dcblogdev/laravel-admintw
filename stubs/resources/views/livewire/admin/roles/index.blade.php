<div>
    <div class="flex justify-between">

        <h1>{{ __('Roles') }}</h1>

        <div>
            @can('add_roles')
                <livewire:admin.roles.create/>
            @endcan
        </div>

    </div>

    @include('errors.messages')

    <div class="bg-primary text-gray-200 py-2 px-4 my-5 rounded-md">
        {{ __('By default only Admin have full access, additional roles will need permissions applying to them by editing the roles below.') }}
    </div>

    <div class="grid sm:grid-cols-1 md:grid-cols-4 gap-4">

        <div class="col-span-2">
            <x-form.input type="search" id="roles" name="query" wire:model.live="query" label="none" :placeholder="__('Search Roles')" />
        </div>

    </div>

    <table>
        <thead>
        <tr>
            <th>
                <a href="#" wire:click="sortBy('name')">{{ __('Name') }}</a>
            </th>
            <th>
            {{ __('Action') }}
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($this->roles() as $role)
        <tr>
            <td>{{ $role->label }}</td>
                <td>
                    <div class="flex space-x-2">

                        @can('edit_roles')
                            <a wire:navigate href="{{ route('admin.settings.roles.edit', ['role' => $role->id]) }}">{{ __('Edit') }}</a>
                        @endcan

                        @if ($role->name !== 'admin')
                            @can('delete_roles')
                                <x-modal>
                                    <x-slot name="trigger">
                                        <a href="#" @click="on = true">{{ __('Delete') }}</a>
                                    </x-slot>

                                    <x-slot name="title">{{ __('Confirm Delete') }}</x-slot>

                                    <x-slot name="content">
                                        <div class="text-center">
                                            {{ __('Are you sure you want to role:') }} <b>{{ $role->name }}</b>
                                        </div>
                                    </x-slot>

                                    <x-slot name="footer">
                                        <button class="btn" @click="on = false">{{ __('Cancel') }}</button>
                                        <button class="btn btn-red" wire:click="deleteRole('{{ $role->id }}')">{{ __('Delete Role') }}</button>
                                    </x-slot>
                                </x-modal>
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
