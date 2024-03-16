<?php

test('can see edit user page', function () {
    $this->authenticate();
    $this
        ->get(route('admin.users.edit', auth()->user()))
        ->assertSeeLivewire('admin.users.edit.admin-settings');
});
