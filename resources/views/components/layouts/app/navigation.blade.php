
@can('view_dashboard')
    <x-nav.link route="dashboard" icon="home">{{ __('Dashboard') }}</x-nav.link>
@endcan

@if(can('view_system_settings') || can('view_roles') || can('view_audit_trails'))
    <x-nav.divider>{{ __('Settings') }}</x-nav.divider>
@endif

@can('view_audit_trails')
    <x-nav.link route="admin.settings.audit-trails.index" icon="identification">{{ __('Audit Trails') }}</x-nav.link>
@endcan

@can('view_roles')
    <x-nav.link route="admin.settings.roles.index" icon="archive-box">{{ __('Roles') }}</x-nav.link>
@endcan

@can('view_system_settings')
    <x-nav.link route="admin.settings" icon="wrench-screwdriver">{{ __('System Settings') }}</x-nav.link>
@endcan

<x-nav.divider>{{ __('Account') }}</x-nav.divider>

@can('view_users')
    <x-nav.link route="admin.users.index" icon="users">{{ __('Users') }}</x-nav.link>
@endcan
