<?php

use App\Http\Livewire\Admin\Users\Users;
use App\Models\User;
use Livewire\Livewire;

test('can see users page')
    ->authenticate()
    ->get(fn() => route('admin.users.index'))
    ->assertOk();

test('is redirected when not authenticated')
    ->get(fn() => route('admin.users.index'))
    ->assertRedirect();

test('can see users edit page')
    ->authenticate()
    ->get(fn() => route('admin.users.edit', User::factory()->create()))
    ->assertOk();

test('can search users', function () {
    Livewire::test(Users::class)
        ->set('name', 'joe')
        ->assertSet('name', 'joe');
});

test('can set property', function () {
    Livewire::test(Users::class)
        ->set('sortField', 'name')
        ->assertSet('sortField', 'name');
});

test('can sort users', function () {
    Livewire::test(Users::class)
        ->call('sortBy', 'name')
        ->assertSet('sortField', 'name')
        ->call('users')
        ->assertStatus(200);
});
