<x-app-layout>
    <x-slot name="title">Edit Account</x-slot>

    <h2 class="dark:text-gray-200">Edit Account</h2>

    <livewire:users.edit-profile :user="auth()->user()"/>

</x-app-layout>
