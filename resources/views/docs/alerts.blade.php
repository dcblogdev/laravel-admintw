<div class="card">
    <h2><a name="alerts">Alerts</a></h2>

    <x-tabs name="preview">
        <x-tabs.header>
            <x-tabs.link name="preview">Preview</x-tabs.link>
            <x-tabs.link name="code">Code</x-tabs.link>
        </x-tabs.header>

        <x-tabs.div name="preview">
            <x-alert>Primary</x-alert>
            <x-alert variant="gray">Gray</x-alert>
            <x-alert variant="red">Red</x-alert>
            <x-alert variant="yellow">Yellow</x-alert>
            <x-alert variant="green">Green</x-alert>
            <x-alert variant="blue">Blue</x-alert>
            <x-alert variant="indigo">Indigo</x-alert>
            <x-alert variant="purple">Purple</x-alert>
            <x-alert variant="pink">Pink</x-alert>
        </x-tabs.div>

        <x-tabs.div name="code">

            <p>Passing a variant will change the background color of the alert. The available variants are: gray, red, yellow, green, blue, indigo, purple, pink.</p>
            <p>Primary is the default variant.</p>

            <pre><code class="language-php">@php echo htmlentities('<x-alert>Primary</x-alert>
<x-alert variant="gray">Gray</x-alert>
<x-alert variant="red">Red</x-alert>
<x-alert variant="yellow">Yellow</x-alert>
<x-alert variant="green">Green</x-alert>
<x-alert variant="blue">Blue</x-alert>
<x-alert variant="indigo">Indigo</x-alert>
<x-alert variant="purple">Purple</x-alert>
<x-alert variant="pink">Pink</x-alert>') @endphp</code></pre>
        </x-tabs.div>
    </x-tabs>
</div>
