<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;

test('can see login page')->get('login')->assertOk();

test('can authenticate', function(){
    $this->authenticate();

    $response = $this->get('login');
    $response->assertRedirect('/app');
});

test('cannot authenticate with invalid password', function(){
    $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
});
