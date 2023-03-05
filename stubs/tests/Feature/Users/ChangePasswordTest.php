<?php

use App\Models\User;

test('can see change password', function () {
    $this->authenticate();

    $user = User::factory()->create();
    $this
        ->get(route('admin.users.edit', $user))
        ->assertOk();
});
