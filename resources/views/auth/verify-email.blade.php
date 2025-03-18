@section('title', __('Verify Email'))

<x-layouts.guest>
    <x-auth-card>

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') === 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <x-form action="{{ route('verification.send') }}">
                <x-button>{{ __('Resend Verification Email') }}</x-button>
            </x-form>

            <x-form action="{{ route('logout') }}">
                <x-button>{{ __('Log Out') }}</x-button>
            </x-form>
        </div>

    </x-auth-card>
</x-layouts.guest>
