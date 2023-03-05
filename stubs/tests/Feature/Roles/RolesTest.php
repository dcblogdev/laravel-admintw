<?php

use App\Models\Role;

beforeEach(function () {
    $this->authenticate();
});

test('can see roles page with admin role', function () {
    $this->get(route('admin.settings.roles.index'))->assertOk();
});

test('can see edit role', function () {
    $role = Role::where('name', 'admin')->first();
    $this->get(route('admin.settings.roles.edit', $role))->assertOk();
});
