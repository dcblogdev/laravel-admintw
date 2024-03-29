<?php

test('can render modal', function () {
    test()->blade('<x-modal>
        <x-slot name="trigger">
            <button @click="on = true">Open</button>
        </x-slot>
        <x-slot name="modalTitle">Modal Title</x-slot>
        <x-slot name="content">
            <p>The content</p>
        </x-slot>

        <x-slot name="footer">
            <button @click="on = false">Cancel</button>
            <button>Delete comment</button>
        </x-slot>
    </x-modal>
    ')->assertSee('Modal Title');
});
