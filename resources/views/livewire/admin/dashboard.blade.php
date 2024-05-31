<div>
    <h1>{{ __('Dashboard') }}</h1>

    <div class="card">
        {{ __("You're logged in!") }}
    </div>

    <div class="card">
        <x-dropdown label="Action">
            <x-dropdown.link href="#">Edit</x-dropdown.link>
            <x-dropdown.link href="#">Delete</x-dropdown.link>
        </x-dropdown>
    </div>

    <x-tabs class="card" name="company">

        <x-tabs.header>
            <x-tabs.link name="details">Details</x-tabs.link>
            <x-tabs.link name="company">Company</x-tabs.link>
            <x-tabs.link name="team">Team</x-tabs.link>
        </x-tabs.header>

        <x-tabs.div name="details">
            <p>Details</p>
        </x-tabs.div>

        <x-tabs.div name="company">
            <p>Company</p>
        </x-tabs.div>

        <x-tabs.div name="team">
            <p>Team</p>
        </x-tabs.div>

    </x-tabs>

</div>
