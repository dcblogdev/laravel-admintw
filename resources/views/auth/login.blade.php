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


            <x-button class="w-full justify-center">Login</x-button><br>
            <x-button>Default</x-button><br>
            <x-button variant="destructive">destructive</x-button><br>
            <x-button variant="outline">outline</x-button><br>
            <x-button variant="secondary">secondary</x-button><br>
            <x-button variant="ghost">ghost</x-button><br>
            <x-button variant="link">link</x-button><br>
            <br>
            <x-button size="xs">xs</x-button><x-button size="xs">xs</x-button><br>
            <x-button size="sm">sm</x-button><br>
            <x-button size="lg">lg</x-button><br>
            <x-button size="xl">xl</x-button><br>


        </x-form>

    </x-auth-card>
</x-layouts.guest>
