<?php

use App\Http\Livewire\Admin\Roles\Create;
use App\Models\Roles\Role;
use Livewire\Livewire;

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
