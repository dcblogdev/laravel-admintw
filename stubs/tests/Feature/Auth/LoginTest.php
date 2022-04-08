<?php

use App\Models\User;

test('can_see_login_page', function () {
    //visit page
    $response = $this->get('login');
    $response->assertStatus(200);
});

test('can see app page')
    ->authenticate()
    ->get(fn() => route('admin'))
    ->assertOk();

test('users cannot authenticate with invalid password', function () {
    $user = User::factory()->create();

    $this->post('/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});

test('is redirected to login when not authenticated', function () {
    $response = $this->get('admin');
    $response->assertStatus(302);
});

test('can login', function () {
    $this->authenticate();

    $response = $this->get('login');
    $response->assertRedirect('/admin');
});
