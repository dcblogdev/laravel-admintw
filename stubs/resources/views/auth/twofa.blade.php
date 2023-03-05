<x-guest-layout>
	<x-auth-card>
		@section('title', __('2FA'))

	<p>{{ __('Please open your authenticator mobile app and enter the code below') }}.</p>

	<x-form action="{{ route('2fa.update') }}">

		<x-form.input name="code" :label="__('Code')">{{ old('code') }}</x-form.input>

		<p><button class="justify-center w-full btn btn-primary">{{ __('Verify Code') }}</button></p>

	</x-form>

	<x-form action="{{ route('logout') }}">
		<p><button type="submit" class="float-right">{{ __('Logout') }}</button>
		</p>
	</x-form>
	</x-auth-card>
</x-guest-layout>
