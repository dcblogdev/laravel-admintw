<?php

use App\Models\User;

test('login screen can be rendered', function () {
    $this
        ->get(route('login'))
        ->assertOk();
});

test('users can authenticate using the login screen', function () {
    $user = User::factory()->create();

    $this
        ->post(route('login'), [
            'email' => $user->email,
            'password' => 'password',
        ])
        ->assertRedirect(route('dashboard'));

    $this->assertAuthenticated();
});

test('users can not authenticate with invalid password', function () {
    $user = User::factory()->create();

    $this
        ->post(route('login'), [
            'email' => $user->email,
            'password' => 'wrong-password',
        ])
        ->assertInvalid();

    $this->assertGuest();
});

test('can logout', function () {
    $this->authenticate();

    $this
        ->post(route('logout'))
        ->assertRedirect('/');

    $this->assertGuest();
});
