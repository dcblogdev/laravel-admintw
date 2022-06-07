<x-guest-layout>
@section('title', '2FA')
<x-auth-card>

	<p>Please open your authenticator mobile app and enter the code below.</p>

	<x-form action="{{ route('2fa.update') }}">

		<x-form.input name="code" label="Code">{{ old('code') }}</x-form.input>

		<p><button class="justify-center w-full btn btn-primary">Verify Code</button></p>

		<p><a href="{{ route('logout') }}" class="float-right">Logout</a></p>

	</x-form>

</x-auth-card>
</x-guest-layout>
