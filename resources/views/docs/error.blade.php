<div class="card">
    <h2><a name="error">Error</a></h2>
    <p>.error use error class to apply red text.</p>

    <x-tabs name="preview">
        <x-tabs.header>
            <x-tabs.link name="preview">Preview</x-tabs.link>
            <x-tabs.link name="code">Code</x-tabs.link>
        </x-tabs.header>

        <x-tabs.div name="preview">
            <p class="error">Paragraph</p>
        </x-tabs.div>

        <x-tabs.div name="code">
            <pre><code class="language-php">@php echo htmlentities('<p class="error">Paragraph</p>') @endphp</code></pre>
        </x-tabs.div>
    </x-tabs>
</div>
