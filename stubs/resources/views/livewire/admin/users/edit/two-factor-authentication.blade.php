<div wire:poll>
    <x-2col>
        <x-slot name="left">
            <h3>Two Factor Authentication</h3>

            @if (auth()->user()->two_fa_active == 'No')
                <p>Add additional security to your account using two-factor authentication.</p>

                <p><b>Why do I need this?</b></p>

                <p>Passwords can get stolen – especially if you use the same password for multiple sites.
                Adding Two-Step Verification means that even if your password gets stolen, your account will remain secure.</p>

                <p><b>How does it work?</b></p>

                <p>After you turn on Two-Step Verification for your account, signing in will be a little different:
                    You'll enter your password, as usual.</p>

                <p>Next open your Authenticator app and copy the code number into the form and submit.</p>
            @endif
        </x-slot>
        <x-slot name="right">

            <div class="card">

                @if (auth()->user()->two_fa_active == 'Yes' && auth()->user()->two_fa_secret_key !='')
                    <p>Your 2-Factor Authentication is in place, to remove this click the button below.</p>
                    <x-button wire:click="remove">Turn off 2FA</x-button>
                @else
                    <p>Authenticator apps generate random codes that you can use to sign in. They do not have access to your password or account information.</p>
                    <p>1Password is a good authenticator app as is Authy.</p>

                    <p><img src='{{ $inlineUrl }}'></p>

                    <p>Scan bar code in your authenticator app or manually enter this key {{ $secretKey }}</p>

                    <x-form.input wire:model="code" label='Code' name='code'></x-form.input>

                    <x-form wire:submit.prevent="update" method="put">

                    <x-button>Turn on 2FA</x-button>

                @endif

                @include('errors.success')

                </x-form>
            </div>

        </x-slot>
    </x-2col>
</div>