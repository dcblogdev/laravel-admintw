<?php

use App\Models\Role;
use App\Http\Livewire\Admin\Roles\Create;
use Livewire\Livewire;

beforeEach(function () {
    $this->authenticate();
});

test('can see roles page with admin role', function () {
    $this->get(route('admin.settings.roles.index'))->assertOk();
});

test('can create role', function () {
    Livewire::test(Create::class)
        ->set('role', 'Editor')
        ->call('store')
        ->assertHasNoErrors(['role' => 'required']);

    $this->assertTrue(Role::where('name', 'editor')->exists());
});

test('cannot create role without role', function () {
    Livewire::test(Create::class)
        ->set('role', '')
        ->call('store')
        ->assertHasErrors(['role' => 'required']);
});

test('is redirected after role creation', function () {
    Livewire::test(Create::class)
        ->set('role', 'Editor')
        ->call('store')
        ->assertRedirect(route('admin.settings.roles.index'));
});

test('on cancel dispatch browser event', function () {
    Livewire::test(Create::class)
        ->call('cancel')
        ->assertDispatchedBrowserEvent('close-modal');
});

test('can see edit role', function () {
    $role = Role::where('name', 'admin')->first();
    $this->get(route('admin.settings.roles.edit', $role))->assertOk();
});
