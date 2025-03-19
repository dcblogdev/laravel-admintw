<div class="card">
    <h2><a name="dropdown">Dropdown</a></h2>

    <x-tabs name="preview">
        <x-tabs.header>
            <x-tabs.link name="preview">Preview</x-tabs.link>
            <x-tabs.link name="code">Code</x-tabs.link>
        </x-tabs.header>

        <x-tabs.div name="preview">

            <div class="w-40">
            <x-dropdown class="mt-5" label="Action">
                <x-dropdown.link href="#">Edit</x-dropdown.link>
                <x-dropdown.link href="#">Delete</x-dropdown.link>
            </x-dropdown>
            </div>

        </x-tabs.div>

        <x-tabs.div name="code">
            <pre><code class="language-php">@php echo htmlentities('<x-dropdown label="Action">
    <x-dropdown.link href="#">Edit</x-dropdown.link>
    <x-dropdown.link href="#">Delete</x-dropdown.link>
</x-dropdown>') @endphp</code></pre>
        </x-tabs.div>
    </x-tabs>
</div>
