<?php

test('can render button', function () {
    test()->blade('<x-button>Go</x-button>')
        ->assertSee('button type="submit"', false);
});

test('can render button as button type', function () {
    test()->blade('<x-button type="button">Go</x-button>')
        ->assertSee('button type="button"', false);
});
