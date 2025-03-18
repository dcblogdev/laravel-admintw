@section('title', __('Login'))

<x-layouts.guest>
    <x-auth-card>

        <x-form action="{{ route('login') }}">

            @include('errors.messages')

            <x-form.input name="email" :label="__('Email')">{{ old('email') }}</x-form.input>
            <x-form.input name="password" :label="__('Password')" type="password" />

            <div class="flex justify-between">
                <p><a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a></p>
                @if (Route::has('register'))
                    <p><a href="{{ route('register') }}">{{ __('Register') }}</a></p>
                @endif
            </div>

            <p><x-button class="w-full justify-center">Login</x-button></p>

        </x-form>

    </x-auth-card>
</x-layouts.guest>
