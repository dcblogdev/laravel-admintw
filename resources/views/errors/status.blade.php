@if (session('status'))
    <x-alert>{{ session('status') }}</x-alert>
@endif
