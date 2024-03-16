<div>
    @can('view_users')
        <p>
            <x-a href="{{ route('admin.users.index') }}">{{ __('Users') }}</x-a>
            <span class="dark:text-gray-200">- {{ __('Edit User') }}</span>
        </p>
    @endcan

    <livewire:admin.users.edit.profile :user="$user"/>
    <livewire:admin.users.edit.change-password :user="$user"/>
    <livewire:admin.users.edit.two-factor-authentication :user="$user"/>

    @can('edit_roles')
        <livewire:admin.users.edit.admin-settings :user="$user"/>
        <livewire:admin.users.edit.roles :user="$user"/>
    @endcan
</div>
