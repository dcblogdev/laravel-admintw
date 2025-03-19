<div class="card">
    <h2><a name="basestyles">Base Styles</a></h2>

    <p>These are base styles that do not use classes.</p>

    <x-tabs name="preview">
        <x-tabs.header>
            <x-tabs.link name="preview">Preview</x-tabs.link>
            <x-tabs.link name="code">Code</x-tabs.link>
        </x-tabs.header>

        <x-tabs.div name="preview">
            <h1>H1</h1>
            <h2>H2</h2>
            <h3>H3</h3>
            <h4>H4</h4>
            <p>Paragraph</p>
            <p><a href="#">Link</a></p>
            <hr>

            <table>
                <thead>
                    <tr>
                        <th>Section</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Users</td>
                        <td>Manage user accounts</td>
                        <td><a href="#">Edit</a></td>
                    </tr>
                </tbody>
            </table>

        </x-tabs.div>

        <x-tabs.div name="code">
<pre><code class="language-php">@php echo htmlentities('<h1>H1</h1>
<h2>H2</h2>
<h3>H3</h3>
<h4>H4</h4>

<p>Paragraph</p>
<p><a href="#">Link</a></p>

<hr>

<table>
    <thead>
        <tr>
            <th>Section</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Users</td>
            <td>Manage user accounts</td>
            <td><a href="#">Edit</a></td>
        </tr>
    </tbody>
</table>') @endphp
</code></pre>
        </x-tabs.div>
    </x-tabs>
</div>
