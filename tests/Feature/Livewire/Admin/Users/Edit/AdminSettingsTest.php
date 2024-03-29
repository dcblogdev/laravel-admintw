<?php

use App\Livewire\Admin\Users\Edit\AdminSettings;
use App\Models\AuditTrail;
use Livewire\Livewire;

beforeEach(function () {
    $this->authenticate();
});

test('can see admin settings', function () {
    $this
        ->get(route('admin.users.edit', auth()->user()))
        ->assertSeeLivewire('admin.users.edit.admin-settings');
});

test('can update user settings', function () {
    Livewire::test(AdminSettings::class, ['user' => auth()->user()])
        ->set('isActive', 1)
        ->set('isOfficeLoginOnly', 1)
        ->call('update')
        ->assertSet('isOfficeLoginOnly', 1)
        ->assertSet('isActive', 1)
        ->assertDispatched('refreshProfile')
        ->assertHasNoErrors();

    $user = auth()->user()->refresh();

    expect($user->is_office_login_only)->toBe(true)
        ->and(AuditTrail::first()->title)->toBe('updated '.auth()->user()->name."'s admin settings")
        ->and(AuditTrail::first()->link)->toBe(route('admin.users.edit', ['user' => $user->id]))
        ->and(AuditTrail::first()->section)->toBe('Users')
        ->and(AuditTrail::first()->type)->toBe('Update');

    $this->assertDatabaseHas('audit_trails', [
        'title' => 'updated '.auth()->user()->name."'s admin settings",
        'link' => route('admin.users.edit', ['user' => auth()->user()->id]),
        'section' => 'Users',
        'type' => 'Update',
    ]);

});

test('does validate', function () {
    Livewire::test(AdminSettings::class, ['user' => auth()->user()])
        ->set('isOfficeLoginOnly', true)
        ->call('update')
        ->assertHasNoErrors();
});

test('does not validate', function () {
    Livewire::test(AdminSettings::class, ['user' => auth()->user()])
        ->set('isActive', 0)
        ->set('isOfficeLoginOnly', 0)
        ->call('update')
        ->assertSet('isOfficeLoginOnly', 0)
        ->assertSet('isActive', 0)
        ->assertDispatched('refreshProfile')
        ->assertHasNoErrors();
});
