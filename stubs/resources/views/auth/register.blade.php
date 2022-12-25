<x-guest-layout>
    @section('title', 'Register')
    <x-auth-card>

        @include('errors.success')

        <x-form action="{{ route('register') }}">

            <x-form.input type="text" label='Name' name="name">{{ old('name') }}</x-form.input>
            <x-form.input type="text" label='Email' name="email">{{ old('email') }}</x-form.input>

            <p>Ensure your account is using a long, random password to stay secure.</p>
            <p>Use a password manager, we recommend using 1Password for creating and storing passwords or <a href="https://1password.com/password-generator/" target="blank">1password.com/password-generator</a></p>

            <div class="alert alert-primary">
                <p class="text-white">Password must be at least 8 characters in length<br>
                at least one lowercase letter<br>
                at least one uppercase letter<br>
                at least one digit</p>
            </div>

            <x-form.input type="password" label='Password' name='password'></x-form.input>
            <x-form.input type="password" label='Confirm Password' name='confirmPassword'></x-form.input>

            <p>Already can an account? <a class="text-primary" href="{{ route('login') }}">Login</a></p>

            <x-button>Submit</x-button>

        </x-form>

    </x-auth-card>
</x-guest-layout>
