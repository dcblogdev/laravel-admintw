<button @click.stop="sidebarOpen = !sidebarOpen" class="md:hidden focus:outline-none pl-1 pt-4 pr-2">
    <svg class="h-6 w-6 transition ease-in-out duration-150 text-white" xmlns="http://www.w3.org/2000/svg"
         fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
    </svg>
</button>

<div class="w-full rounded-sm px-4 py-1 text-center">
    <h3 class="mb-1 font-semibold text-white">
        <a href="{{ route('dashboard') }}" class="text-white font-bold">
            {{ config('app.name') }}
        </a>
    </h3>
</div>

@can('view_dashboard')
    <x-nav.link route="dashboard" icon="fas fa-home">{{ __('Dashboard') }}</x-nav.link>
@endcan

@if(can('view_system_settings') || can('view_roles') || can('view_audit_trails') || can('view_sent_emails'))
    <x-nav.group label="Settings" route="admin.settings" icon="fas fa-cogs">
        @can('view_audit_trails')
            <x-nav.group-item route="admin.settings.audit-trails.index" icon="far fa-circle">Audit Trails</x-nav.group-item>
        @endcan

        @can('view_roles')
            <x-nav.group-item route="admin.settings.roles.index" icon="far fa-circle">Roles</x-nav.group-item>
        @endcan

        @can('view_system_settings')
            <x-nav.group-item route="admin.settings" icon="far fa-circle">System Settings</x-nav.group-item>
        @endcan
    </x-nav.group>
@endif

@can('view_users')
    <x-nav.link route="admin.users.index" icon="fas fa-users">Users</x-nav.link>
@endcan
