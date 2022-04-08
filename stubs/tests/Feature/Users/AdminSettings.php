<?php

test('can see admin settings', function () {
    $user = $this->authenticate();

    $response = $this->get(route('admin.users.edit', $user));

    $response->assertSeeLivewire('users.edit.admin-settings');
});