@component('mail::message')

<h1>Hello {{ $user->name }}</h1>

<p>{{ $user->invite->name }} has invited you to join {{ config('admin.name') }}</p>

@component('mail::button', ['url' => url("join/$user->invite_token")])
    Join {{ config('admin.name') }}
@endcomponent

<p>Thanks, {{ config('admin.name') }}</p>

@endcomponent
