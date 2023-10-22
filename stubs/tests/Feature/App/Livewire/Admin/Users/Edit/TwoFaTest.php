<?php

use App\Models\User;

beforeEach(function () {
    $this->authenticate();
});

test('can set property', function () {
    $this
        ->get(route('admin.users.edit', User::factory()->create()))
        ->assertSeeLivewire('admin.users.edit.two-factor-authentication');
});
