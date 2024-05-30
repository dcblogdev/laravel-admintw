@use(App\Models\Permission)
<div>
    <p class="mb-5">
        <x-a class="link" href="{{ route('admin.settings.roles.index') }}">{{ __('Roles') }}</x-a>
        <span class="dark:text-gray-200">- {{ __('Edit Role') }}</span>
    </p>

    <div class="float-right">
        <span class="error">*</span>
        <span class="dark:text-gray-200"> = {{ __('required') }}</span>
    </div>

    <div class="clearfix"></div>

    <x-form wire:submit="update" method="put">

        <div class="row">

            <div class="md:w-1/2">
                @if ($role->name === 'admin')
                    <x-form.input wire:model="label" :label="__('Role')" name='label' disabled />
                @else
                    <x-form.input wire:model="label" :label="__('Role')" name='label' required />
                @endif
            </div>

        </div>

        @if ($role->name !== 'admin')

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($modules as $module)
                <div class="card relative">
                    <h3>{{ $module }}</h3>
                    @foreach (Permission::where('module', $module)->orderby('name')->get() as $perm)
                        <label class="block cursor-pointer">
                            <div class="flex gap-2">
                            <input
                                type="checkbox"
                                class="module-checkbox"
                                wire:model="permissions"
                                value="{{ $perm->name }}"
                            >
                                {{ $perm->label }}
                            </div>
                        </label>
                    @endforeach
                </div>
            @endforeach
            </div>

        @endif

        <x-button class="mt-5">{{ __('Update Role') }}</x-button>

    </x-form>

</div>

