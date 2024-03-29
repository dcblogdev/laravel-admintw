<x-guest-layout>
    <x-auth-card>
        @section('title', __('Reset Password'))

    <x-form action="{{ route('password.store') }}">

        @include('errors.messages')

        <input type="hidden" name="token" value="{{ $request->route('token') }}" />
        <x-form.input name="email" :label="__('Email')">{{ $request->input('email') }}</x-form.input>
        <x-form.input type="password" name="password" :label="__('Password')" />
        <x-form.input type="password" name='password_confirmation' :label="__('Confirm Password')" />
        <x-form.submit>{{ __('Reset Password') }}</x-form.submit>

    </x-form>
    </x-auth-card>
</x-guest-layout>
