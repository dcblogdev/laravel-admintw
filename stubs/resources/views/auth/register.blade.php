<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-form.input label="Name" name="name">{{ old('name') }}</x-form.input>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-form.input label="Email" name="email">{{ old('email') }}</x-form.input>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-form.input type="password" label="Password" name="password"></x-form.input>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-form.input type="password" label="Comfirm Password" name="password_confirmation"></x-form.input>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button class="ml-4 btn btn-blue">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
