<?php

use App\Http\Livewire\Admin\Users\Users;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    $this->authenticate();
});

test('can see users page', function () {
    $this
        ->get(route('admin.users.index'))
        ->assertOk();
});

test('can see users edit page', function () {
    $this
        ->get(route('admin.users.edit', User::factory()->create()))
        ->assertOk();
});

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
