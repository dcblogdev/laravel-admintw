@section('title', __('Join'))

<x-layouts.guest>
    <x-auth-card>

        @include('errors.success')

        <p>{{ $user->invite->name }} {{ __('has invited you to join') }} {{ config('app.name') }}.</p>

        <x-form action="{{ route('join.update', ['id' => $user->id]) }}" method="put">

            <x-form.input type="text" :label="__('Name')" name="name">{{ $user->name }}</x-form.input>
            <x-form.input type="text" :label="__('Email')" disabled>{{ $user->email }}</x-form.input>
            <x-form.input type="password" :label="__('Password')" name='newPassword'></x-form.input>
            <x-form.input type="password" :label="__('Confirm Password')" name='confirmPassword'></x-form.input>

            <x-button>{{ __('Save Password') }}</x-button>

        </x-form>

    </x-auth-card>
</x-layouts.guest>
