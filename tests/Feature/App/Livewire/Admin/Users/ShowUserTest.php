<?php

test('can see user', function () {
    $this->authenticate();
    $this
        ->get(route('admin.users.show', auth()->user()))
        ->assertOk();
});
