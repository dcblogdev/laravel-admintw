<?php

use App\Livewire\Admin\Users\Edit\Roles;
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
