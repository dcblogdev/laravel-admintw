
@can('view_dashboard')
    <x-nav.link route="dashboard" icon="home">{{ __('Dashboard') }}</x-nav.link>
@endcan

@if(can('view_system_settings') || can('view_roles') || can('view_audit_trails'))
    <div class="px-3 pt-5 pb-2 text-xs font-semibold tracking-wider text-gray-500 uppercase">
        {{ __('Settings') }}
    </div>
@endif

@can('view_audit_trails')
    <x-nav.link route="admin.settings.audit-trails.index" icon="identification">{{ __('Audit Trails') }}</x-nav.link>
@endcan

@can('view_roles')
    <x-nav.link route="admin.settings.roles.index" icon="archive-box">{{ __('Roles') }}</x-nav.link>
@endcan

@can('view_system_settings')
    <x-nav.link route="admin.settings" icon="cog">{{ __('System Settings') }}</x-nav.link>
@endcan

<div class="px-3 pt-5 pb-2 text-xs font-semibold tracking-wider text-gray-500 uppercase">
    {{ __('Account') }}
</div>

@can('view_users')
    <x-nav.link route="admin.users.index" icon="users">{{ __('Users') }}</x-nav.link>
@endcan
