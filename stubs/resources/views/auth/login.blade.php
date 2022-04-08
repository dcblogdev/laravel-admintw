<x-guest-layout>
<x-auth-card>

	<x-form action="{{ route('login') }}">

		@include('errors.messages')

		<x-form.input name="email" label="Email">{{ old('email') }}</x-form.input>
		<x-form.input name="password" label="Password" type="password" />

		<div class="flex justify-between">
			<a href="{{ route('password.request') }}">Forgot your password?</a>
			<a href="{{ route('register') }}">Register</a>
		</div>

		<p><button type="submit" class="btn btn-primary w-full justify-center">Login</button></p>

	</x-form>

</x-auth-card>

</x-guest-layout>
