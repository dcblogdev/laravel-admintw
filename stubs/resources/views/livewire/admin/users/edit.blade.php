@section('title', 'Edit')
<div>
    <div class="mb-5">
       <a href="{{ route('admin.users.index') }}">Users</a>
        <span class="dark:text-gray-200">- Edit User</span>
   </div>

    <livewire:admin.users.edit.profile :user="$user"/>
    <livewire:admin.users.edit.change-password :user="$user"/>
    <livewire:admin.users.edit.two-factor-authentication :user="$user"/>
    @if (is_admin())
        <livewire:admin.users.edit.admin-settings :user="$user"/>
        <livewire:admin.users.edit.roles :user="$user"/>
    @endif
</div>