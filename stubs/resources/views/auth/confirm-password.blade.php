<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-form.input type="password" label="Password" name="password"></x-form.input>
            </div>

            <div class="flex justify-end mt-4">
                <button class="btn btn-blue">
                    {{ __('Confirm') }}
                </button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
