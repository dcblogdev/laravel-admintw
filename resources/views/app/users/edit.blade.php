<x-app-layout>

    <h2 class="dark:text-gray-200">Edit Account</h2>

    <livewire:users.edit-profile :user="auth()->user()"/>

</x-app-layout>
