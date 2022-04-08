@section('title', 'Roles')
<div>
    <div class="flex justify-between">

        <h1>Roles</h1>

        <div>
            <livewire:admin.roles.create/>
        </div>

    </div>

    @include('errors.messages')


    <div class="bg-primary text-gray-200 py-2 px-4 my-5 rounded-md">
        By default only Admin roles have permissions, additional roles will need permissions applying to them by editing the roles below.
    </div>

    <div class="grid sm:grid-cols-1 md:grid-cols-4 gap-4">

        <div class="col-span-2">
            <x-form.input type="search" id="roles" name="query" wire:model="query" label="none" placeholder="Search Roles">
                {{ old('query', request('query')) }}
            </x-form.input>
        </div>

    </div>

    <table>
        <thead>
        <tr>
            <th>
                <a href="#" wire:click.prevent="sortBy('name')">Name</a>
            </th>
            <th>
                Action
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($this->roles() as $role)
            <tr>
                <td>{{ $role->label }}</td>
                <td>
                    <div class="flex space-x-2">

                        <a href="{{ route('admin.settings.roles.edit', ['role' => $role->id]) }}">Edit</a>

                        @if ($role->label == 'App')

                        @else
                            <x-modal>
                                <x-slot name="trigger">
                                    <a href="#" @click="on = true">Delete</a>
                                </x-slot>

                                <x-slot name="title">Confirm Delete</x-slot>

                                <x-slot name="content">
                                    <div class="text-center">
                                        Are you sure you want to role: <b>{{ $role->name }}</b>
                                    </div>
                                </x-slot>

                                <x-slot name="footer">
                                    <button class="btn" @click="on = false">Cancel</button>
                                    <button class="btn btn-red" wire:click="deleteRole('{{ $role->id }}')">Delete Role</button>
                                </x-slot>
                            </x-modal>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $this->roles()->links() }}

</div>
