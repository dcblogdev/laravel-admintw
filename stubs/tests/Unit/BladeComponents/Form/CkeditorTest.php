<?php

test('can render checkbox', function () {
    test()
        ->blade('<x-form.checkbox />')
        ->assertSee("type='checkbox'", false);
});
