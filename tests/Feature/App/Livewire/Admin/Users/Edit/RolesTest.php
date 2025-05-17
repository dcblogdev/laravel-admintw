<?php

declare(strict_types=1);

use App\Livewire\Admin\Users\Edit\Roles;
use App\Models\Role;
use Livewire\Livewire;

beforeEach(function () {
    $this->authenticate();
});

test('can load roles', function () {
    Livewire::test(Roles::class, ['user' => auth()->user()])
        ->set('roles', ['admin'])
        ->assertOk();
});

test('can update', function () {
    Livewire::test(Roles::class, ['user' => auth()->user()])
        ->set('roles', ['admin'])
        ->call('update')
        ->assertHasNoErrors();
});

test('can update record audit', function () {
    Livewire::test(Roles::class, ['user' => auth()->user()])
        ->set('roles', ['admin'])
        ->call('update');

    $this->assertDatabaseHas('audit_trails', [
        'title' => 'updated '.auth()->user()->name."'s roles",
        'link' => route('admin.users.edit', ['user' => auth()->user()->id]),
        'section' => 'Users',
        'type' => 'Update',
    ]);
});

test('roles', function () {

    $role = Role::create([
        'label' => 'Editor',
        'name' => 'editor',
    ]);

    Livewire::test(Roles::class, ['user' => auth()->user()])
        ->set('roleSelections', [$role->id])
        ->assertSet('roleSelections', [$role->id]);
});

test('must have at least one admin role', function () {

    $role = Role::create([
        'label' => 'Editor',
        'name' => 'editor',
    ]);

    $roles = [];
    $roles[] = $role->id;

    Livewire::test(Roles::class, ['user' => auth()->user()])
        ->set('roleSelections', $roles)
        ->call('update')
        ->assertDontSee('Roles Updated!')
        ->assertSee('there must be at least one admin user!');

    $this->assertDatabaseMissing('model_has_roles', [
        'role_id' => $role->id,
    ]);

    $this->assertDatabaseMissing('audit_trails', [
        'title' => 'updated '.auth()->user()->name."'s roles",
    ]);

    $this->assertTrue(auth()->user()->fresh()->hasRole('admin'));
    $this->assertFalse(auth()->user()->fresh()->hasRole('editor'));
});
