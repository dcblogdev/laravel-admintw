<div class="card">
    <h2><a name="tabs">Tabs</a></h2>

    <x-tabs name="preview">
        <x-tabs.header>
            <x-tabs.link name="preview">Preview</x-tabs.link>
            <x-tabs.link name="code">Code</x-tabs.link>
        </x-tabs.header>

        <x-tabs.div name="preview">

            <x-tabs name="company">

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

        </x-tabs.div>

        <x-tabs.div name="code">
            <pre><code class="language-php">@php echo htmlentities('<x-tabs name="company">
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
</x-tabs>') @endphp</code></pre>
        </x-tabs.div>
    </x-tabs>
</div>
