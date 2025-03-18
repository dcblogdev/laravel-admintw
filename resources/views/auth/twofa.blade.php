@section('title', __('2FA'))

<x-layouts.guest>
	<x-auth-card>

        <p>{{ __('Please open your authenticator mobile app and enter the code below') }}.</p>

        <x-form action="{{ route('admin.2fa.update') }}">

            <x-form.input name="code" :label="__('Code')">{{ old('code') }}</x-form.input>

            <p><x-button class="justify-center w-full">{{ __('Verify Code') }}</x-button></p>

        </x-form>

        <x-form action="{{ route('logout') }}">
            <p><x-button type="submit" class="float-right">{{ __('Logout') }}</x-button></p>
        </x-form>

	</x-auth-card>
</x-layouts.guest>
