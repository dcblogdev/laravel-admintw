<x-guest-layout>
@section('title', 'Register')
<x-auth-card>

    @include('errors.success')

    <x-form action="{{ route('register') }}">

        <x-form.input type="text" label='Name' name="name">{{ old('name') }}</x-form.input>
        <x-form.input type="text" label='Email' name="email">{{ old('email') }}</x-form.input>
        <x-form.input type="password" label='Password' name='password'></x-form.input>
        <x-form.input type="password" label='Confirm Password' name='confirmPassword'></x-form.input>

        <p>Already can an account? <a class="text-primary" href="{{ route('login') }}">Login</a></p>

        <x-button>Save Password</x-button>

    </x-form>

</x-auth-card>
</x-guest-layout>
