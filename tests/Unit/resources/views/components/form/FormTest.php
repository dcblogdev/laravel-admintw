<?php

test('can render form', function () {
    test()->blade('<x-form></x-form>')
        ->assertSee('<form method="post"', false);
});

test('can render form with a get method', function () {
    test()->blade('<x-form method="get"></x-form>')
        ->assertSee('<form method="get"', false);
});

test('can render form with a get method case insensitive', function () {
    test()->blade('<x-form method="GET"></x-form>')
        ->assertSee('<form method="get"', false);
});

test('can render form with a patch method', function () {
    test()->blade('<x-form method="patch"></x-form>')
        ->assertSee('<input type="hidden" name="_method" value="patch">', false);
});

test('can render form with a put method', function () {
    test()->blade('<x-form method="put"></x-form>')
        ->assertSee('<input type="hidden" name="_method" value="put">', false);
});

test('can render form with a delete method', function () {
    test()->blade('<x-form method="delete"></x-form>')
        ->assertSee('<input type="hidden" name="_method" value="delete">', false);
});

test('when using post form has a CSRF token input', function () {
    test()->blade('<x-form></x-form>')
        ->assertSee('<input type="hidden" name="_token" value="" autocomplete="off">', false);
});

test('when using get form has not got a CSRF token input', function () {
    test()->blade('<x-form method="get"></x-form>')
        ->assertDontSee('<input type="hidden" name="_token" value="">', false);
});
