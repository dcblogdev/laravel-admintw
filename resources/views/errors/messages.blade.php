@foreach (session('flash_notification', collect())->toArray() as $message)
    <x-alert variant="{{ $message['level'] }}">{{ $message['message'] }}</x-alert>
@endforeach

{{ session()->forget('flash_notification') }}

@if (session('message'))
    <x-alert>{{ session('message') }}</x-alert>
@endif

@if (session('success'))
    <x-alert variant="red">{{ session('success') }}</x-alert>
@endif

@if (session('status'))
    <x-alert>{{ session('status') }}</x-alert>
@endif
