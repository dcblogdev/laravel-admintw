@section('title', __('System Settings'))
<div>
    <h1>{{ __('System Settings') }}</h1>

    <livewire:admin.settings.application-settings/>
    <livewire:admin.settings.security-settings/>
</div>
