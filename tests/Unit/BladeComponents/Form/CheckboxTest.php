<?php

test('can render checkbox', function () {
    test()->blade('<x-form.checkbox />')
        ->assertSee('type="checkbox"', false);
});

test('can render checkbox with label', function () {
    test()->blade('<x-form.checkbox label="Agree to terms" />')
        ->assertSee('Agree to terms');
});

test('when id is not specified and the name is they should both be matched', function () {
    test()->blade("<x-form.checkbox name='terms' />")
        ->assertSee("id='terms'", false);
});

test('checkbox is checked', function () {
    test()->blade("<x-form.checkbox value='terms' selected='terms' />")
        ->assertSee("checked='checked'", false);
});
