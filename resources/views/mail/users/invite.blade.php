@component('mail::message')

# {{ __('Hello') }} {{ $user->name }}

**{{ $user->invite->name }}** {{ __('has invited you to join') }} {{ config('config.name') }}

@component('mail::button', ['url' => url("join/$user->invite_token")])
    {{ __('Join') }} {{ config('config.name') }}
@endcomponent

{{ __('Thanks') }}, {{ config('config.name') }}

@endcomponent
