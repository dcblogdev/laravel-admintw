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
                <livewire:admin.roles.row :$role :key="$role->id" @delete="deleteRole('{{ $role->id }}')" />
            @endforeach
            </tbody>
        </table>

        {{ $this->roles()->links() }}

    </div>

</div>
