<?php

use App\Livewire\Admin\Users\Users;
use App\Mail\Users\SendInviteMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
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

test('can sort users in desc', function () {

    User::factory()->create(['name' => 'Andy']);
    User::factory()->create(['name' => 'Dave']);
    User::factory()->create(['name' => 'Zara']);

    Livewire::test(Users::class)
        ->call('sortBy', 'name')
        ->assertSet('sortField', 'name')
        ->assertSeeInOrder(['Zara', 'Dave', 'Andy']);
});

test('can sort users in asc', function () {

    User::factory()->create(['name' => 'Andy']);
    User::factory()->create(['name' => 'Dave']);
    User::factory()->create(['name' => 'Zara']);

    Livewire::test(Users::class)
        ->call('sortBy', 'name')
        ->call('sortBy', 'name')
        ->assertSet('sortAsc', true)
        ->assertSeeInOrder(['Andy', 'Dave', 'Zara']);
});

test('can filter', function () {

    User::factory()->create([
        'name' => 'Andy',
        'email' => 'demo@demo.com',
        'created_at' => '2023-01-10',
    ]);

    User::factory()->create([
        'name' => 'Fred',
        'email' => 'fred@demo.com',
        'joined_at' => '2023-01-11',
        'created_at' => '2023-01-10',
    ]);

    User::factory()->create([
        'name' => 'Dave',
        'email' => 'demo45@demo.com',
        'created_at' => '2023-04-10',
    ]);

    Livewire::test(Users::class)
        ->set('email', 'demo@demo.com')
        ->set('joined', '2023-01-01 to 2023-01-31')
        ->call('users')
        ->assertOk()
        ->assertSet('openFilter', true)
        ->assertSee('demo@demo.com')
        ->assertDontSee('demo45@demo.com');
});

test('can filter joined', function () {

    User::factory()->create([
        'name' => 'Andy',
        'email' => 'demo@demo.com',
        'created_at' => '2023-01-10',
    ]);

    User::factory()->create([
        'name' => 'Fred',
        'email' => 'fred@demo.com',
        'joined_at' => '2023-01-11',
        'created_at' => '2023-01-10',
    ]);

    Livewire::test(Users::class)
        ->set('joined', '2023-01-01 to 2023-01-31')
        ->call('users')
        ->assertOk()
        ->assertSet('openFilter', true)
        ->assertSee('fred@demo.com');
});

test('can filter name', function () {

    User::factory()->create([
        'name' => 'Andy',
        'email' => 'demo@demo.com',
    ]);

    Livewire::test(Users::class)
        ->set('name', 'Andy')
        ->call('users')
        ->assertOk()
        ->assertSet('openFilter', false)
        ->assertSee('Andy');
});

test('can filter email', function () {

    User::factory()->create([
        'name' => 'Andy',
        'email' => 'demo@demo.com',
    ]);

    Livewire::test(Users::class)
        ->set('email', 'demo@demo.com')
        ->call('users')
        ->assertOk()
        ->assertSet('openFilter', true)
        ->assertSee('demo@demo.com');
});

test('can reset', function () {

    Livewire::test(Users::class)
        ->call('resetFilters')
        ->assertSet('name', '')
        ->assertSet('email', '')
        ->assertSet('joined', '')
        ->assertSet('openFilter', false);
});

test('can delete user', function () {

    $user = User::factory()->create([
        'name' => 'Dave',
        'email' => 'demo45@demo.com',
        'created_at' => '2023-04-10',
    ]);

    Livewire::test(Users::class)
        ->call('deleteUser', $user->id);

    $this->assertSoftDeleted('users', [
        'id' => $user->id,
    ]);
});

test('can resend invite', function () {

    Mail::fake();

    $user = User::factory()->create([
        'name' => 'Dave',
        'email' => 'demo45@demo.com',
        'created_at' => '2023-04-10',
        'is_active' => false,
        'invite_token' => Str::random(32),
        'invited_by' => auth()->id(),
        'invited_at' => now(),
    ]);

    Livewire::test(Users::class)
        ->call('resendInvite', $user->id);

    Mail::assertSent(SendInviteMail::class);
});
