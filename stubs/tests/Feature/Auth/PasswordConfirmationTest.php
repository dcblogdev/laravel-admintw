<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

test('confirm password screen can be rendered', function () {

    $this->authenticate();

    $this->get('/confirm-password')
        ->assertOk();
});

test('password is not confirmed with invalid password', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('confirm-password', [
        'password' => 'wrong-password',
    ]);

    $response->assertInvalid();
});
