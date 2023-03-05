<?php

use App\Models\Role;
use App\Models\User;

test('can see register page', function () {
    $this->get(route('register'))->assertOk();
});

test('users cannot register with invalid password', function () {
    $this->post(route('register'), [
        'name' => $this->faker->name(),
        'email' => $this->faker->email(),
        'password' => '',
    ]);

    $this->assertGuest();
});

test('users cannot register with existing email', function () {
    $user = User::factory()->create();
    $password = 'ght73A3!$^DS';

    $this->post(route('register'), [
        'name' => $this->faker->name(),
        'email' => $user->email,
        'password' => $password,
        'confirmPassword' => $password,
    ])->assertInvalid();

    $this->assertGuest();
});

test('users cannot register without matching password', function () {
    $user = User::factory()->create();
    $password = 'ght73A3!$^DS';

    $this->post(route('register'), [
        'name' => $this->faker->name(),
        'email' => $user->email,
        'password' => $password,
        'confirmPassword' => 'other',
    ])->assertInvalid();

    $this->assertGuest();
});

test('users can register', function () {
    Role::firstOrCreate(['name' => 'admin', 'label' => 'Admin']);
    $password = 'ght73A3!$^DS';

    $this->post(route('register'), [
        'name' => $this->faker->name(),
        'email' => $this->faker->email,
        'password' => $password,
        'confirmPassword' => $password,
    ])->assertValid()
    ->assertRedirect();
});
