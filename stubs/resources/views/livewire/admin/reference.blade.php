@section('title', 'Reference')
<div>
    <x-2col>
        <x-slot name="left">
            <h3>Headings</h3>
        </x-slot>
        <x-slot name="right">

            <div class="card">
                <x-tab name="preview">
                    <x-tabs.header>
                        <x-tabs.link name="preview">Preview</x-tabs.link>
                        <x-tabs.link name="code">Code</x-tabs.link>
                    </x-tabs.header>

                    <x-tabs.div name="preview">
                        <h1>H1 Examples</h1>
                        <h2>H2 Examples</h2>
                        <h3>H3 Examples</h3>
                        <h4>H4 Examples</h4>
                    </x-tabs.div>

                    <x-tabs.div name="code">
                        <pre><code class="language-php">
                            &lt;h1&gt;H1 Example&lt;/h1&gt;
                            &lt;h2&gt;H2 Example&lt;/h2&gt;
                            &lt;h3&gt;H3 Example&lt;/h3&gt;
                            &lt;h4&gt;H4 Example&lt;/h4&gt;
                        </code></pre>
                    </x-tabs.div>
                </x-tab>
            </div>

        </x-slot>
    </x-2col>

    <hr/>

    <x-2col>
        <x-slot name="left">
            <h3>Column Layout</h3>
        </x-slot>
        <x-slot name="right">
            <div class="card">
                <x-tab name="preview">
                    <x-tabs.header>
                        <x-tabs.link name="preview">Preview</x-tabs.link>
                        <x-tabs.link name="code">Code</x-tabs.link>
                    </x-tabs.header>

                    <x-tabs.div name="preview">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-blue-300">col 1</div>
                            <div class="bg-blue-300">col 2</div>
                        </div>
                    </x-tabs.div>

                    <x-tabs.div name="code">
                        <pre><code class="language-php">
                                @php echo htmlentities('<div class="grid grid-cols-2 gap-4">
                                <div class="bg-blue-300">col 1</div>
                                <div class="bg-blue-300">col 2</div>
                                </div>');
                            @endphp
                        </code></pre>
                    </x-tabs.div>
                </x-tab>

            </div>
        </x-slot>
    </x-2col>

    <hr/>

    <x-2col>
        <x-slot name="left">
            <h3>Buttons</h3>
        </x-slot>
        <x-slot name="right">
            <div class="card">

                <x-tab name="preview">
                    <x-tabs.header>
                        <x-tabs.link name="preview">Preview</x-tabs.link>
                        <x-tabs.link name="code">Code</x-tabs.link>
                    </x-tabs.header>

                    <x-tabs.div name="preview">
                        <a href="#">Styled link</a>
                        <button class="btn btn-gray">Gray</button>
                        <button class="btn btn-red">Red</button>
                        <button class="btn btn-yellow">Yellow</button>
                        <button class="btn btn-green">Green</button>
                        <button class="btn btn-blue">Blue</button>
                        <button class="btn btn-indigo">Indigo</button>
                        <button class="btn btn-purple">Purple</button>
                        <button class="btn btn-pink">Pink</button>
                    </x-tabs.div>

                    <x-tabs.div name="code">
                        <pre><code class="language-php">
                            @php echo htmlentities('<a href="#">Styled link</a>
                            <button class="btn btn-gray">Gray</button>
                            <button class="btn btn-red">Red</button>
                            <button class="btn btn-yellow">Yellow</button>
                            <button class="btn btn-green">Green</button>
                            <button class="btn btn-blue">Blue</button>
                            <button class="btn btn-indigo">Indigo</button>
                            <button class="btn btn-purple">Purple</button>
                            <button class="btn btn-pink">Pink</button>');
                            @endphp
                        </code></pre>
                    </x-tabs.div>
                </x-tab>

            </div>
        </x-slot>
    </x-2col>

    <x-2col>
        <x-slot name="left">
            <h3>Alerts</h3>
        </x-slot>
        <x-slot name="right">
            <div class="card">
                <x-tab name="preview">
                    <x-tabs.header>
                        <x-tabs.link name="preview">Preview</x-tabs.link>
                        <x-tabs.link name="code">Code</x-tabs.link>
                    </x-tabs.header>

                    <x-tabs.div name="preview">
                        <div class="alert alert-gray">Gray</div>
                        <div class="alert alert-red">Red</div>
                        <div class="alert alert-yellow">Yellow</div>
                        <div class="alert alert-green">Green</div>
                        <div class="alert alert-blue">Blue</div>
                        <div class="alert alert-indigo">Indigo</div>
                        <div class="alert alert-purple">Purple</div>
                        <div class="alert alert-pink">Pink</div>
                    </x-tabs.div>

                    <x-tabs.div name="code">
                        <pre><code class="language-php">
                            @php echo htmlentities('<div class="alert alert-gray">Gray</div>
                            <div class="alert alert-red">Red</div>
                            <div class="alert alert-yellow">Yellow</div>
                            <div class="alert alert-green">Green</div>
                            <div class="alert alert-blue">Blue</div>
                            <div class="alert alert-indigo">Indigo</div>
                            <div class="alert alert-purple">Purple</div>
                            <div class="alert alert-pink">Pink</div>');
                            @endphp
                        </code></pre>
                    </x-tabs.div>
                </x-tab>

            </div>
        </x-slot>
    </x-2col>

    <hr/>

    <x-2col>
        <x-slot name="left">
            <h3>Dropdown</h3>
        </x-slot>
        <x-slot name="right">

            <div class="card">
                <x-tab name="preview">
                    <x-tabs.header>
                        <x-tabs.link name="preview">Preview</x-tabs.link>
                        <x-tabs.link name="code">Code</x-tabs.link>
                    </x-tabs.header>

                    <x-tabs.div name="preview">
                        <div class="w-1/3">
                            <x-dropdown label="Action" alignment="left">
                                <x-slot name="trigger">
                                    <button>View</button>
                                    <button>Edit</button>
                                </x-slot>

                                <x-dropdown-link href="#">Edit</x-dropdown-link>
                                <x-dropdown-link href="#">Delete</x-dropdown-link>
                            </x-dropdown>
                        </div>
                    </x-tabs.div>

                    <x-tabs.div name="code">
                        <pre><code class="language-php">
                            &lt;div class=&quot;w-1/3&quot;&gt;
                                &lt;x-dropdown label=&quot;Action&quot; alignment=&quot;left&quot;&gt;
                                    &lt;x-slot name=&quot;trigger&quot;&gt;
                                        &lt;button&gt;View&lt;/button&gt;
                                        &lt;button&gt;Edit&lt;/button&gt;
                                    &lt;/x-slot&gt;

                                    &lt;x-dropdown-link href=&quot;#&quot;&gt;Edit&lt;/x-dropdown-link&gt;
                                    &lt;x-dropdown-link href=&quot;#&quot;&gt;Delete&lt;/x-dropdown-link&gt;
                                &lt;/x-dropdown&gt;
                            &lt;/div&gt;
                        </code></pre>
                    </x-tabs.div>
                </x-tab>
            </div>
        </x-slot>
    </x-2col>

    <hr/>

    <x-2col>
        <x-slot name="left">
            <h3>Table</h3>
        </x-slot>
        <x-slot name="right">
            <div class="card">
                <x-tab name="preview">
                    <x-tabs.header>
                        <x-tabs.link name="preview">Preview</x-tabs.link>
                        <x-tabs.link name="code">Code</x-tabs.link>
                    </x-tabs.header>

                    <x-tabs.div name="preview">
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Dave</td>
                                    <td>dave@domain.co.uk</td>
                                </tr>
                                <tr>
                                    <td>Joe</td>
                                    <td>joe@domain.co.uk</td>
                                </tr>
                            </tbody>
                        </table>
                    </x-tabs.div>

                    <x-tabs.div name="code">
                        <pre><code class="language-php">
                            @php echo htmlentities('<table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Dave</td>
                                    <td>dave@domain.co.uk</td>
                                </tr>
                                <tr>
                                    <td>Dan</td>
                                    <td>joe@domain.co.uk</td>
                                </tr>
                            </tbody>
                        </table>');
                        @endphp

                        </code></pre>
                    </x-tabs.div>
                </x-tab>


            </div>
        </x-slot>
    </x-2col>

    <hr/>

    <x-2col>
        <x-slot name="left">
            <h3>Form</h3>
        </x-slot>
        <x-slot name="right">
            <div class="card">
                <x-tab name="preview">
                    <x-tabs.header>
                        <x-tabs.link name="preview">Preview</x-tabs.link>
                        <x-tabs.link name="code">Code</x-tabs.link>
                    </x-tabs.header>

                    <x-tabs.div name="preview">
                        <x-form method="get">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>

                                    <x-form.input name="name">{{ old('name', 'Dave') }}</x-form.input>

                                    <x-form.select name="gender">
                                        <x-form.select-option value="">Select</x-form.select-option>
                                        <x-form.select-option value="male" selected="male">Male</x-form.select-option>
                                        <x-form.select-option value="female">Female</x-form.select-option>
                                    </x-form.select>

                                    <x-form.checkbox name="checkbox" label="Agree to terms" checked="true" />

                                </div>

                                <div>

                                    <x-form.input name="image" type="file"></x-form.input>

                                    <x-form.group label="T-shirt Size">
                                        <x-form.radio name="size" id="s1" label="Small" value="sm"></x-form.radio>
                                        <x-form.radio name="size" id="s2" label="Medium" value="md"></x-form.radio>
                                        <x-form.radio name="size" id="s3" label="Large" value="lg"></x-form.radio>
                                        <x-form.radio name="size" id="s4" label="XL" value="xl"></x-form.radio>
                                        <x-form.radio name="size" id="s5" label="XXL" value="xxl"></x-form.radio>
                                    </x-form.group>

                                </div>
                            </div>

                            <hr/>

                            <h3>Date and Time pickers</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                <div>
                                    <x-form.date name="date" label="Date"></x-form.date>
                                    <x-form.daterange name="daterange" label="Date Range"></x-form.daterange>
                                    <x-form.datetime name="datetime" label="Date Time"></x-form.datetime>
                                </div>

                                <div>
                                    <x-form.time name="time" label="Time"></x-form.time>
                                    <x-form.timeday name="timeday" label="Time Day between 08:00 and 18:00 "></x-form.timeday>
                                </div>

                            </div>

                            <hr/>

                            <x-form.textarea name="comments"></x-form.textarea>

                            <x-form.submit>Submit</x-form.submit>

                        </x-form>
                    </x-tabs.div>

                    <x-tabs.div name="code">
                        <pre><code class="language-php">
                            &lt;x-form method=&quot;get&quot;&gt;

                                &lt;div class="grid grid-cols-1 md:grid-cols-2 gap-4"&gt;
                                    &lt;div&gt;

                                        &lt;x-form.input name=&quot;name&quot;&gt;{{ old('name', 'Dave') }}&lt;/x-form.input&gt;

                                        &lt;x-form.select name=&quot;gender&quot;&gt;
                                            &lt;x-form.select-option value=&quot;&quot;&gt;Select&lt;/x-form.select-option&gt;
                                            &lt;x-form.select-option value=&quot;male&quot; selected=&quot;male&quot;&gt;Male&lt;/x-form.select-option&gt;
                                            &lt;x-form.select-option value=&quot;female&quot;&gt;Female&lt;/x-form.select-option&gt;
                                        &lt;/x-form.select&gt;

                                        &lt;x-form.checkbox name=&quot;checkbox&quot; label=&quot;Agree to terms&quot; checked=&quot;true&quot;&gt;&lt;/x-form.checkbox&gt;

                                    &lt;/div&gt;

                                    &lt;div&gt;

                                        &lt;x-form.input name=&quot;image&quot; type=&quot;file&quot;&gt;&lt;/x-form.input&gt;

                                        &lt;x-form.group label=&quot;T-shirt Size&quot;&gt;
                                            &lt;x-form.radio name=&quot;size&quot; id=&quot;s1&quot; label=&quot;Small&quot; value=&quot;sm&quot;&gt;&lt;/x-form.radio&gt;
                                            &lt;x-form.radio name=&quot;size&quot; id=&quot;s2&quot; label=&quot;Medium&quot; value=&quot;md&quot;&gt;&lt;/x-form.radio&gt;
                                            &lt;x-form.radio name=&quot;size&quot; id=&quot;s3&quot; label=&quot;Large&quot; value=&quot;lg&quot;&gt;&lt;/x-form.radio&gt;
                                            &lt;x-form.radio name=&quot;size&quot; id=&quot;s4&quot; label=&quot;XL&quot; value=&quot;xl&quot;&gt;&lt;/x-form.radio&gt;
                                            &lt;x-form.radio name=&quot;size&quot; id=&quot;s5&quot; label=&quot;XXL&quot; value=&quot;xxl&quot;&gt;&lt;/x-form.radio&gt;
                                        &lt;/x-form.group&gt;

                                    &lt;/div&gt;
                                &lt;/div&gt;

                                &lt;hr/&gt;

                                &lt;h3&gt;Date and Time pickers&lt;/h3&gt;

                                &lt;div class="grid grid-cols-1 md:grid-cols-2 gap-4"&gt;

                                    &lt;div&gt;
                                        &lt;x-form.date name=&quot;date&quot; label=&quot;Date&quot;&gt;&lt;/x-form.date&gt;
                                        &lt;x-form.daterange name=&quot;daterange&quot; label=&quot;Date Range&quot;&gt;&lt;/x-form.daterange&gt;
                                        &lt;x-form.datetime name=&quot;datetime&quot; label=&quot;Date Time&quot;&gt;&lt;/x-form.datetime&gt;
                                    &lt;/div&gt;

                                    &lt;div&gt;
                                        &lt;x-form.time name=&quot;time&quot; label=&quot;Time&quot;&gt;&lt;/x-form.time&gt;
                                        &lt;x-form.timeday name=&quot;timeday&quot; label=&quot;Time Day between 08:00 and 18:00 &quot;&gt;&lt;/x-form.timeday&gt;
                                    &lt;/div&gt;

                                &lt;/div&gt;

                                &lt;hr/&gt;

                                &lt;x-form.textarea name=&quot;comments&quot;&gt;&lt;/x-form.textarea&gt;

                                &lt;x-form.submit&gt;Submit&lt;/x-form.submit&gt;

                            &lt;/x-form&gt;
                        </code></pre>
                    </x-tabs.div>
                </x-tab>

            </div>
        </x-slot>
    </x-2col>

    <hr/>

    <x-2col>
        <x-slot name="left">
            <h3>Modal</h3>
        </x-slot>
        <x-slot name="right">
            <div class="card">
                <x-tab name="preview">
                    <x-tabs.header>
                        <x-tabs.link name="preview">Preview</x-tabs.link>
                        <x-tabs.link name="code">Code</x-tabs.link>
                    </x-tabs.header>

                    <x-tabs.div name="preview">
                        <x-modal>

                            <x-slot name="trigger">
                                <button @click="on = true" class="text-blue-600 dark:text-gray-300">
                                    Delete Comment
                                </button>
                            </x-slot>

                            <x-slot name="title">Are you sure you want to delete the comment?</x-slot>

                            <x-slot name="content">
                                <p>This cannot be undone.</p>

                                <p>In Livewire components use<br>
                                $this->dispatchBrowserEvent('close-modal');<br>to fire a close event</p>
                            </x-slot>

                            <x-slot name="footer">
                                <button @click="on = false">Cancel</button>
                                <button class="btn btn-red">Delete comment</button>
                            </x-slot>
                        </x-modal>
                    </x-tabs.div>

                    <x-tabs.div name="code">
                        <pre><code class="language-php">
                            &lt;x-modal&gt;

                                &lt;x-slot name=&quot;trigger&quot;&gt;
                                    &lt;button @click=&quot;on = true&quot; class=&quot;text-blue-600 dark:text-gray-300&quot;&gt;
                                        Delete Comment
                                    &lt;/button&gt;
                                &lt;/x-slot&gt;

                                &lt;x-slot name=&quot;title&quot;&gt;Are you sure you want to delete the comment?&lt;/x-slot&gt;

                                &lt;x-slot name=&quot;content&quot;&gt;
                                    &lt;p&gt;This cannot be undone.&lt;/p&gt;

                                    &lt;p&gt;In Livewire components use&lt;br&gt;
                                        $this-&gt;dispatchBrowserEvent('close-modal');&lt;br&gt;to fire a close event&lt;/p&gt;

                                &lt;/x-slot&gt;

                                &lt;x-slot name=&quot;footer&quot;&gt;

                                    &lt;button @click=&quot;on = false&quot;&gt;Cancel&lt;/x-button&gt;
                                    &lt;button class=&quot;btn btn-red&quot;&gt;Delete comment&lt;/x-button&gt;

                                &lt;/x-slot&gt;
                            &lt;/x-modal&gt;
                        </code></pre>
                    </x-tabs.div>
                </x-tab>

            </div>
        </x-slot>
    </x-2col>

    <hr/>

    <x-2col>
        <x-slot name="left">
            <h3>Remaining characters</h3>
        </x-slot>
        <x-slot name="right">
            <div class="card">
                <x-tab name="preview">
                    <x-tabs.header>
                        <x-tabs.link name="preview">Preview</x-tabs.link>
                        <x-tabs.link name="code">Code</x-tabs.link>
                    </x-tabs.header>

                    <x-tabs.div name="preview">
                        <div x-data="{
                            content: 'Hello....',
                            limit: $el.dataset.limit,
                            get remaining() {
                                return this.limit - this.content.length
                            }
                        }" data-limit="160">
                            <x-form.textarea x-ref="content" x-model="content" maxlength="160"></x-form.textarea>
                             <p x-ref="remaining">
                                You have <span x-text="remaining"></span> characters remaining.
                            </p>
                        </div>
                    </x-tabs.div>

                    <x-tabs.div name="code">
                        <pre><code class="language-php">
                            &lt;div x-data=&quot;{
                                content: 'Hello....',
                                limit: $el.dataset.limit,
                                get remaining() {
                                    return this.limit - this.content.length
                                }
                            }&quot; data-limit=&quot;160&quot;&gt;
                                &lt;x-form.textarea x-ref=&quot;content&quot; x-model=&quot;content&quot; maxlength=&quot;160&quot;&gt;&lt;/x-form.textarea&gt;
                                 &lt;p x-ref=&quot;remaining&quot;&gt;
                                    You have &lt;span x-text=&quot;remaining&quot;&gt;&lt;/span&gt; characters remaining.
                                &lt;/p&gt;
                            &lt;/div&gt;
                        </code></pre>
                    </x-tabs.div>
                </x-tab>

            </div>
        </x-slot>
    </x-2col>

    <hr/>

    <x-2col>
        <x-slot name="left">
            <h3>Tabs</h3>
        </x-slot>
        <x-slot name="right">
            <div class="card">

                <x-tab name="preview">
                    <x-tabs.header>
                        <x-tabs.link name="preview">Preview</x-tabs.link>
                        <x-tabs.link name="code">Code</x-tabs.link>
                    </x-tabs.header>

                    <x-tabs.div name="preview">
                        <x-tab name="preview">

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

                        </x-tab>
                    </x-tabs.div>

                    <x-tabs.div name="code">
                        <pre><code class="language-php">
                            &lt;x-tab name=&quot;company&quot;&gt;

                            &lt;x-tabs.header&gt;
                                &lt;x-tabs.link name=&quot;details&quot;&gt;Details&lt;/x-tabs.link&gt;
                                &lt;x-tabs.link name=&quot;company&quot;&gt;Company&lt;/x-tabs.link&gt;
                                &lt;x-tabs.link name=&quot;team&quot;&gt;Team&lt;/x-tabs.link&gt;
                            &lt;/x-tabs.header&gt;

                            &lt;x-tabs.div name=&quot;details&quot;&gt;
                                &lt;p&gt;Details&lt;/p&gt;
                            &lt;/x-tabs.div&gt;

                            &lt;x-tabs.div name=&quot;company&quot;&gt;
                                &lt;p&gt;Company&lt;/p&gt;
                            &lt;/x-tabs.div&gt;

                            &lt;x-tabs.div name=&quot;team&quot;&gt;
                                &lt;p&gt;Team&lt;/p&gt;
                            &lt;/x-tabs.div&gt;

                        &lt;/x-tab&gt;
                        </code></pre>
                    </x-tabs.div>
                </x-tab>


            </div>
        </x-slot>
    </x-2col>

    <hr/>

    <x-2col>
        <x-slot name="left">
            <h3>Search Select</h3>
        </x-slot>
        <x-slot name="right">
            <div class="card">

                <x-tab name="preview">
                    <x-tabs.header>
                        <x-tabs.link name="preview">Preview</x-tabs.link>
                        <x-tabs.link name="code">Code</x-tabs.link>
                    </x-tabs.header>

                    <x-tabs.div name="preview">
                        <x-tab name="preview">
                            <x-form.select-search :data="$users" wire:model="userId" />
                        </x-tab>
                    </x-tabs.div>

                    <x-tabs.div name="code">
                        <pre><code class="language-php">
                            @php echo htmlentities('<x-form.select-search :data="$users" wire:model="userId" />'); @endphp
                        </code></pre>
                    </x-tabs.div>
                </x-tab>


            </div>
        </x-slot>
    </x-2col>
</div>