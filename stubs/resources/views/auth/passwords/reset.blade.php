<x-guest-layout>
@section('title', 'Reset Password')
<x-auth-card>

	@include('errors.messages')

	<x-form action="{{ route('password.reset.update', ['token' => $token]) }}">
		<x-form.input name="token" type="hidden" label="none">{{ $token }}</x-form.input>

		<p>Ensure your account is using a long, random password to stay secure.</p>
		<p>Use a password manager, we recommend using 1Password for creating and storing passwords or <a href="https://passwordsgenerator.net/" target="blank" class="link link-blue">passwordsgenerator.net</a></p>

		<div class="alert alert-primary">
			<p class="text-white">New password must be at least 8 characters in length<br>
			at least one lowercase letter<br>
			at least one uppercase letter<br>
			at least one digit</p>
		</div>

		<x-form.input name="email" label="Email">{{ old('email', request('email')) }}</x-form.input>
		<x-form.input name="password" label="Password" type="password"></x-form.input>
		<x-form.input name="password_confirmation" label="Confirm password" type="password"></x-form.input>

		<p><x-button type="submit" class="justify-center w-full">Update Password</x-button></p>

		<p><a href="{{ route('login') }}" class="float-right">Login</a></p>

	</x-form>

</x-auth-card>
</x-guest-layout>