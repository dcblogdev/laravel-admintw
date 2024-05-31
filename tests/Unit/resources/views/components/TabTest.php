<?php

test('can see tab component', function () {
    test()->blade('<x-tabs name="sections"></x-tabs>')->assertSee('sections');
});

test('can see tab header', function () {
    test()->blade('<x-tabs.header></x-tabs.header>')->assertSee('border-b border-gray-200');
});

test('can see tab link', function () {
    test()->blade('<x-tabs.link name="details"></x-tabs.link>')->assertSee('details');
});

test('can see active div', function () {
    test()->blade('<x-tabs.div name="details">Some Text</x-tabs.div>')->assertSee('Some Text');
});
