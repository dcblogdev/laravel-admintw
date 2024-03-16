<?php

use App\Models\Role;
use App\Models\Tenant;
use App\Models\User;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertGuest;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

test('can see register page', function () {
    get(route('register'))->assertOk();
});

test('users cannot register with invalid password', function () {
    post(route('register'), [
        'name' => fake()->name(),
        'email' => fake()->email(),
        'password' => '',
    ]);

    assertGuest();
});

test('users cannot register with existing email', function () {
    $user = User::factory()->create();
    $password = 'ght73A3!$^DS';

    post(route('register'), [
        'name' => fake()->name(),
        'email' => $user->email,
        'password' => $password,
        'confirmPassword' => $password,
    ])->assertInvalid();

    assertGuest();
});

test('users cannot register without matching password', function () {
    $user = User::factory()->create();
    $password = 'ght73A3!$^DS';

    post(route('register'), [
        'name' => fake()->name(),
        'email' => $user->email,
        'password' => $password,
        'confirmPassword' => 'other',
    ])->assertInvalid();

    assertGuest();
});

test('users can register', function () {
    //Role::firstOrCreate(['name' => 'admin', 'label' => 'Admin']);
    $password = 'ght73A3!$^DS';
    $email = fake()->email();

    post(route('register'), [
        'name' => fake()->name(),
        'email' => $email,
        'password' => $password,
        'confirmPassword' => $password,
    ])->assertValid()
        ->assertRedirect();

    $user = User::where('email', $email)->first();
    $tenant = Tenant::find($user->tenant_id);

    assertDatabaseHas('tenants', ['owner_id' => $user->id]);
    assertDatabaseHas('tenant_users', [
        'tenant_id' => $tenant->id,
        'user_id' => $user->id,
    ]);
    assertDatabaseHas('users', ['tenant_id' => $tenant->id]);

    expect($user->hasRole('admin'))->toBeTrue();
    expect($tenant->owner_id)->toBe($user->id);
    expect($tenant->owner->id)->toBe($user->id);
});
