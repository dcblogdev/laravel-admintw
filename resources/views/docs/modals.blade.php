<div class="card">
    <h2><a name="modals">Modals</a></h2>

    <x-tabs name="preview">
        <x-tabs.header>
            <x-tabs.link name="preview">Preview</x-tabs.link>
            <x-tabs.link name="code">Code</x-tabs.link>
        </x-tabs.header>

        <x-tabs.div name="preview">
            <x-modal>
                <x-slot name="trigger">
                    <x-button @click="on = true">Open Modal</x-button>
                </x-slot>

                <x-slot name="modalTitle">Title</x-slot>

                <x-slot name="content">
                    <p>Content</p>
                </x-slot>

                <x-slot name="footer">
                    <x-button variant="gray" @click="close()">{{ __('Close') }}</x-button>
                    <x-button @click="close()">{{ __('Do some action') }}</x-button>
                </x-slot>

            </x-modal>
        </x-tabs.div>

        <x-tabs.div name="code">

            <pre><code class="language-php">@php echo htmlentities('<x-modal>
<x-slot name="trigger">
    <x-button @click="on = true">Open Modal</x-button>
</x-slot>

<x-slot name="modalTitle">Title</x-slot>

<x-slot name="content">
    <p>Content</p>
</x-slot>

<x-slot name="footer">
    <x-button variant="gray" @click="close()">{{ __(\'Close\') }}</x-button>
    <x-button @click="close()">{{ __(\'Do some action\') }}</x-button>
</x-slot>

</x-modal>')@endphp</code></pre>
        </x-tabs.div>
    </x-tabs>
</div>


<div class="card">
    <h2><a name="confirmmodals">Confirm Modals</a></h2>

    <x-tabs name="preview">
        <x-tabs.header>
            <x-tabs.link name="preview">Preview</x-tabs.link>
            <x-tabs.link name="code">Code</x-tabs.link>
        </x-tabs.header>

        <x-tabs.div name="preview">
            <div x-data="{ confirmation: '' }">
                <x-modal>
                    <x-slot name="trigger">
                        <x-button variant="red" @click="on = true">Delete</x-button>
                    </x-slot>

                    <x-slot name="modalTitle">
                        <div class="mt-5">
                            {{ __('Are you sure you want to delete this?') }}
                        </div>
                    </x-slot>

                    <x-slot name="content">
                        <label class="flex flex-col gap-2">
                            {{ __('Type') }} "demo" {{ __('to confirm') }}
                            <input autofocus x-model="confirmation" class="px-3 py-2 border border-slate-300 rounded-lg">
                        </label>
                    </x-slot>

                    <x-slot name="footer">
                        <x-button variant="gray" @click="close()">{{ __('Close') }}</x-button>
                        <x-button type="submit" variant="red" x-bind:disabled="confirmation !== 'demo'">{{ __('Delete') }}</x-button>
                    </x-slot>

                </x-modal>
            </div>
        </x-tabs.div>

        <x-tabs.div name="code">

            <pre><code class="language-php">@php echo htmlentities('<div x-data="{ confirmation: \'\' }">
<x-modal>
    <x-slot name="trigger">
        <x-button variant="red" @click="on = true">Delete</x-button>
    </x-slot>

    <x-slot name="modalTitle">
        <div class="mt-5">
            {{ __(\'Are you sure you want to delete this?\') }}
        </div>
    </x-slot>

    <x-slot name="content">
        <label class="flex flex-col gap-2">
            {{ __(\'Type\') }} "demo" {{ __(\'to confirm\') }}
            <input autofocus x-model="confirmation" class="px-3 py-2 border border-slate-300 rounded-lg">
        </label>
    </x-slot>

    <x-slot name="footer">
        <x-button variant="gray" @click="close()">{{ __(\'Close\') }}</x-button>
        <x-button type="submit" variant="red" x-bind:disabled="confirmation !== \'demo\'">{{ __(\'Delete\') }}</x-button>
    </x-slot>

</x-modal>
</div>')@endphp</code></pre>
        </x-tabs.div>
    </x-tabs>
</div>
