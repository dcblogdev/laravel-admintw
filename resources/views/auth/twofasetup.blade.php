@section('title', '2FA')

<x-layouts.guest>
	<x-auth-card>
		<p>{{ __('Please open your authenticator mobile app and enter the code below') }}.</p>

        <p>{{ __('Authenticator apps generate random codes that you can use to sign in. They do not have access to your password or account information') }}.</p>
        <p>{{ __('We recommend using 1Password') }}.</p>

        <p><img alt="QR code" src="{{ $inlineUrl }}"></p>

        <p>{{ __('Scan bar code in your authenticator app or manually enter this key') }} {{ $secretKey }}</p>

        <x-form action="{{ route('admin.2fa-setup.update') }}">

            <x-form.input name="secretKey" type="hidden">{{ $secretKey }}</x-form.input>

            <x-form.input name="code" :label="__('Code')">{{ old('code') }}</x-form.input>

            <p><button class="justify-center w-full btn btn-primary">{{ __('Verify Code') }}</button></p>

            <p><a href="{{ route('logout') }}" class="float-right">{{ __('Logout') }}</a></p>

        </x-form>

	</x-auth-card>
</x-layouts.guest>
