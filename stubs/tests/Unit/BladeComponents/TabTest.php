<?php

test('can see tab component', function () {
    $this->blade('<x-tab name="sections"></x-tab>')->assertSee('sections');
});

test('can see tab header', function () {
    $this->blade('<x-tabs.header></x-tabs.header>')->assertSee('border-b border-gray-200');
});

test('can see tab link', function () {
    $this->blade('<x-tabs.link name="details"></x-tabs.link>')->assertSee('details');
});

test('can see active div', function () {
    $this->blade('<x-tabs.div name="details">Some Text</x-tabs.div>')->assertSee('Some Text');
});
