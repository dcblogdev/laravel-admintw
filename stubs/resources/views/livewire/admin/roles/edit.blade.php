@section('title', 'Edit Role')
<div>
    <div class="mb-5">
        <a href="{{ route('admin.settings.roles.index') }}">Roles</a>
        <span class="dark:text-gray-200">- Edit Role</span>
    </div>


    <div class="float-right"><span class="text-red-600">*</span> <span class="dark:text-gray-200"> = required</span>
    </div>

    <div class="clearfix"></div>

    <x-form wire:submit.prevent="update" method="put">

        <div class="row">

            <div class="md:w-1/2">
                @if ($role?->label == 'Admin')
                    <x-form.input wire:model="label" label='Role' name='label' disabled></x-form.input>
                @else
                    <x-form.input wire:model="label" label='Role' name='label' required></x-form.input>
                @endif
            </div>

        </div>

        @if ($role?->name != 'admin')

            <div class="mx-auto max-w-screen-md">
                    @foreach($modules as $module)
                        <h3 class="mt-4">{{ $module }}</h3>
                        <table>
                            <thead>
                            <tr>
                                <th class="dark:text-gray-300">Permission</th>
                                <th class="dark:text-gray-300">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach (\App\Models\Roles\Permission::where('module', $module)->orderby('name')->get() as $perm)
                                <tr>
                                    <td>{{ $perm->label }}</td>
                                    <td><input type="checkbox" wire:model="permission" value="{{ $perm->id }}"></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endforeach
                </div>

        @endif

        <x-form.submit>Update Role</x-form.submit>

    </x-form>

</div>
