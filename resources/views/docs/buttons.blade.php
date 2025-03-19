<div class="card">
    <h2><a name="buttons">Buttons</a></h2>

    <x-tabs name="preview">
        <x-tabs.header>
            <x-tabs.link name="preview">Preview</x-tabs.link>
            <x-tabs.link name="code">Code</x-tabs.link>
        </x-tabs.header>

        <x-tabs.div name="preview">
            <p>Colours:</p>
            <x-button>Primary</x-button>
            <x-button variant="gray">Gray</x-button>
            <x-button variant="red">Red</x-button>
            <x-button variant="yellow">Yellow</x-button>
            <x-button variant="green">Green</x-button>
            <x-button variant="blue">Blue</x-button>
            <x-button variant="indigo">Indigo</x-button>
            <x-button variant="purple">Purple</x-button>
            <x-button variant="pink">Pink</x-button>
            <x-button variant="link">Link</x-button>

            <p class="mt-5">Sizes:</p>
            <x-button size="xs">XS</x-button>
            <x-button size="sm">SM</x-button>
            <x-button>Default</x-button>
            <x-button size="lg">LG</x-button>
            <x-button size="xl">XL</x-button>

        </x-tabs.div>

        <x-tabs.div name="code">

            <p>Passing a variant will change the background color of the alert. The available variants are: gray, red, yellow, green, blue, indigo, purple, pink, link.</p>
            <p>Primary is the default variant.</p>

            <p>Size Variants</p>

            <pre><code class="language-php">@php echo htmlentities('<x-button>Primary</x-button>
<x-button variant="gray">Gray</x-button>
<x-button variant="red">Red</x-button>
<x-button variant="yellow">Yellow</x-button>
<x-button variant="green">Green</x-button>
<x-button variant="blue">Blue</x-button>
<x-button variant="indigo">Indigo</x-button>
<x-button variant="purple">Purple</x-button>
<x-button variant="pink">Pink</x-button>
<x-button variant="link">Link</x-button>') @endphp</code></pre>
        </x-tabs.div>
    </x-tabs>
</div>
