<?php

use App\Models\Roles\Role;

use function Pest\Laravel\get;

beforeEach(function () {
    $this->user = authenticate();
});

test('can see roles page with admin role', function () {
    get(route('admin.settings.roles.index'))->assertOk();
});

test('cannot see roles page with user role', function () {
    authenticate('user');
    get(route('admin.settings.roles.index'))->assertStatus(302);
});

test('can see edit role', function () {
    $role = Role::where('name', 'admin')->first();
    get(route('admin.settings.roles.edit', $role))->assertOk();
});
