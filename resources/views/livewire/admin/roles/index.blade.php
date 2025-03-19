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

        <x-alert>
            <x-heroicon-c-information-circle class="size-6 sm:size-5 mr-2 sm:mr-1.5 flex-shrink-0" />
            <span class="flex-1">
                {{ __("By default, only admin roles have full access. Additional roles will need permissions applied by editing the roles below.") }}
            </span>
        </x-alert>

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
                <livewire:admin.roles.row :$role :key="$role->id" @delete="deleteRole('{{ $role->id }}')" />
            @endforeach
            </tbody>
        </table>

        {{ $this->roles()->links() }}

    </div>

</div>
