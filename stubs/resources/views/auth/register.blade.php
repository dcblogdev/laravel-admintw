<x-guest-layout>
    <x-auth-card>
        @section('title', __('Register'))

    @include('errors.messages')

    <x-form action="{{ route('register') }}">
        <x-form.input type="text" :label="__('Name')" name="name">{{ old('name') }}</x-form.input>
        <x-form.input type="email" :label="__('Email')" name="email">{{ old('email') }}</x-form.input>
        <x-form.input type="password" :label="__('Password')" name='password'></x-form.input>
        <x-form.input type="password" :label="__('Confirm Password')" name='confirmPassword'></x-form.input>
        <div class="flex items-center justify-end mt-4">
            <p><a href="{{ route('login') }}" class="pt-2 mr-5 underline">{{ __('Already registered?') }}</a></p>
            <x-form.submit>{{ __('Register') }}</x-form.submit>
        </div>
    </x-form>
    </x-auth-card>
</x-guest-layout>
