<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-form.input label="Email" name="email">{{ old('email') }}</x-form.input>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-form.input type="password" label="Password" name="password"></x-form.input>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-form.input type="password" label="Confirm Password" name="password_confirmation"></x-form.input>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button class="btn btn-blue">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
