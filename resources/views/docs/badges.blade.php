<div class="card">
    <h2><a name="badges">Badge</a></h2>

    <x-tabs name="preview">
        <x-tabs.header>
            <x-tabs.link name="preview">Preview</x-tabs.link>
            <x-tabs.link name="code">Code</x-tabs.link>
        </x-tabs.header>

        <x-tabs.div name="preview">
            <x-badge>Primary</x-badge>
            <x-badge variant="gray">Gray</x-badge>
            <x-badge variant="red">Red</x-badge>
            <x-badge variant="yellow">Yellow</x-badge>
            <x-badge variant="green">Green</x-badge>
            <x-badge variant="blue">Blue</x-badge>
            <x-badge variant="indigo">Indigo</x-badge>
            <x-badge variant="purple">Purple</x-badge>
            <x-badge variant="pink">Pink</x-badge>
        </x-tabs.div>

        <x-tabs.div name="code">

            <p>Passing a variant will change the background color of the alert. The available variants are: gray, red, yellow, green, blue, indigo, purple, pink.</p>
            <p>Primary is the default variant.</p>

            <pre><code class="language-php">@php echo htmlentities('<x-badge>Primary</x-badge>
<x-badge variant="gray">Gray</x-badge>
<x-badge variant="red">Red</x-badge>
<x-badge variant="yellow">Yellow</x-badge>
<x-badge variant="green">Green</x-badge>
<x-badge variant="blue">Blue</x-badge>
<x-badge variant="indigo">Indigo</x-badge>
<x-badge variant="purple">Purple</x-badge>
<x-badge variant="pink">Pink</x-badge>') @endphp</code></pre>
        </x-tabs.div>
    </x-tabs>
</div>
