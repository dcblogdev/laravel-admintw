@section('title', __('Reset Password'))

<x-layouts.guest>
    <x-auth-card>

        <x-form action="{{ route('password.store') }}">

            @include('errors.messages')

            <input type="hidden" name="token" value="{{ $request->route('token') }}" />
            <x-form.input name="email" :label="__('Email')">{{ $request->input('email') }}</x-form.input>
            <x-form.input type="password" name="password" :label="__('Password')" />
            <x-form.input type="password" name='password_confirmation' :label="__('Confirm Password')" />
            <x-button>{{ __('Reset Password') }}</x-button>

        </x-form>

    </x-auth-card>
</x-layouts.guest>
