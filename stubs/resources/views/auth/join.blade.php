<x-guest-layout>
@section('title', 'Join')
<x-auth-card>

    @include('errors.success')

    <p>{{ $user->invite->name }} has invited you to join {{ config('app.name') }}.</p>

    <x-form action="{{ route('join.update', ['id' => $user->id]) }}" method="put">

        <x-form.input type="text" label='Name' name="name">{{ $user->name }}</x-form.input>
        <x-form.input type="text" label='Email' disabled>{{ $user->email }}</x-form.input>
        <x-form.input type="password" label='Password' name='newPassword'></x-form.input>
        <x-form.input type="password" label='Confirm Password' name='confirmPassword'></x-form.input>

        <x-button>Save Password</x-button>

    </x-form>

</x-auth-card>
</x-guest-layout>
