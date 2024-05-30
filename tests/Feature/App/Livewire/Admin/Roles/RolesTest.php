<?php

use App\Livewire\Admin\Roles\Roles;
use App\Models\Role;
use Livewire\Livewire;

beforeEach(function () {
    $this->authenticate();
});

test('can see roles page with admin role', function () {
    $this->get(route('admin.settings.roles.index'))->assertOk();
});

test('can sort roles', function () {

    Role::create([
        'name' => 'editor',
        'label' => 'Editor',
    ]);

    Role::create([
        'name' => 'manager',
        'label' => 'Manager',
    ]);

    Livewire::test(Roles::class)
        ->call('sortBy', 'name')
        ->assertSet('sortField', 'name')
        ->call('roles')
        ->assertOk();
});

test('can sort in desc', function () {

    Role::create([
        'name' => 'editor',
        'label' => 'Editor',
    ]);

    Role::create([
        'name' => 'manager',
        'label' => 'Manager',
    ]);

    Livewire::test(Roles::class)
        ->set('sortField', 'name')
        ->call('sortBy', 'name')
        ->assertSet('sortField', 'name')
        ->call('roles')
        ->assertOk();
});

test('can filter', function () {

    Role::create([
        'name' => 'manager',
        'label' => 'Manager',
    ]);

    Livewire::test(Roles::class)
        ->set('name', 'manager')
        ->call('roles')
        ->assertOk();
});

test('can delete role', function () {

    $role = Role::create([
        'name' => 'editor',
        'label' => 'Editor',
    ]);

    Livewire::test(Roles::class)
        ->call('deleteRole', $role->id)
        ->assertOk()
        ->assertDontSee('Editor');

    $this->assertDatabaseMissing('roles', ['id' => $role->id]);
});
