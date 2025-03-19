<div class="card">
    <h2><a name="forms">Forms</a></h2>

    <x-tabs name="preview">
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

            <hr class="my-5" />

            <x-form.textarea name="comments"></x-form.textarea>

            <x-button>Submit</x-button>

        </x-form>

        </x-tabs.div>

        <x-tabs.div name="code">
            <pre><code class="language-php">@php echo htmlentities('<x-form method="get">

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>

        <x-form.input name="name">{{ old(\'name\', \'Dave\') }}</x-form.input>

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

<hr class="my-5" />

<x-form.textarea name="comments"></x-form.textarea>

<x-button>Submit</x-button>

</x-form>') @endphp</code></pre>
        </x-tabs.div>

    </x-tabs>
</div>
