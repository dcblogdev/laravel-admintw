@section('title', __('Register'))

<x-layouts.guest>
    <x-auth-card>

        @include('errors.messages')

        <x-form action="{{ route('register') }}">
            <x-form.input type="text" :label="__('Name')" name="name">{{ old('name') }}</x-form.input>
            <x-form.input type="email" :label="__('Email')" name="email">{{ old('email') }}</x-form.input>
            <x-form.input type="password" :label="__('Password')" name='password'></x-form.input>
            <x-form.input type="password" :label="__('Confirm Password')" name='confirmPassword'></x-form.input>

            <div class="flex items-center justify-end mt-4">
                <p><a href="{{ route('login') }}" class="pt-2 mr-5 underline">{{ __('Already registered?') }}</a></p>
                <x-button>{{ __('Register') }}</x-button>
            </div>

        </x-form>

    </x-auth-card>
</x-layouts.guest>
