@if (session('success'))
    <x-alert variant="red">{{ session('success') }}</x-alert>
@endif
