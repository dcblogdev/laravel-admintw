<x-guest-layout>
@section('title', '2FA')
<x-auth-card>

	<p>Please open your authenticator mobile app and enter the code below.</p>

	<p>Authenticator apps generate random codes that you can use to sign in. They do not have access to your CRM password or account information.</p>
	<p>We recommend using 1Password.</p>

	<p><img src='{{ $inlineUrl }}'></p>

	<p>Scan bar code in your authenticator app or manually enter this key {{ $secretKey }}</p>

	<x-form action="{{ route('2fa-setup.update') }}">

		<x-form.input name="secretKey" type="hidden">{{ $secretKey }}</x-form.input>

		<x-form.input name="code" label="Code">{{ old('code') }}</x-form.input>

		<p><button class="justify-center w-full btn btn-primary">Verify Code</button></p>

		<p><a href="{{ route('logout') }}" class="float-right">Logout</a></p>

	</x-form>

</x-auth-card>
</x-guest-layout>
