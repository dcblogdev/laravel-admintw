<?php

use App\Models\User;

test('can see admin settings', function () {
    $this->authenticate();

    $user = User::factory()->create();

    $response = $this->get(route('admin.users.edit', $user));

    $response->assertSeeLivewire('admin.users.edit.admin-settings');
});
