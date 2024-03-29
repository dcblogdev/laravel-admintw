@section('title', __('Confirm Password'))

<x-guest-layout>
    <x-auth-card>

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        @include('errors.messages')

        <x-form action="{{ route('password.confirm') }}">
            <x-form.input type="password" :label="__('Password')" name="password" />
            <x-form.submit class="justify-center w-full btn btn-primary">{{ __('Confirm') }}</x-form.submit>
        </x-form>

    </x-auth-card>
</x-guest-layout>
