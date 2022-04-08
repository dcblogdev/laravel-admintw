<?php

test('can see dashboard', function () {
    authenticate()
        ->get(route('admin.users.index'))
        ->assertOk();
});

test('can see users page', function () {
    $this->authenticate();
    $this->get(route('admin.users.index'))->assertOk();
});
