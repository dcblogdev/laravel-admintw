<x-guest-layout>
    <x-auth-card>
        @section('title', __('Forgot Password'))

    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    @include('errors.messages')

    <x-form action="{{ route('password.email') }}">
        <x-form.input type="email" :label="__('Email')" name="email">{{ old('email') }}</x-form.input>
        <x-form.submit>{{ __('Email Password Reset Link') }}</x-form.submit>
    </x-form>
    </x-auth-card>

</x-guest-layout>
