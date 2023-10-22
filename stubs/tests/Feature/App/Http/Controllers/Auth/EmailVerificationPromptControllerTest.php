<?php

use App\Models\User;

test('email verification screen can be rendered', function () {
    $user = User::factory()->create([
        'email_verified_at' => null,
    ]);

    $this
        ->actingAs($user)
        ->get(route('verification.notice'))
        ->assertStatus(200);
});

test('verify-email redirects', function () {
    $this->authenticate();

    $this->get(route('verification.notice'))
        ->assertRedirect(route('dashboard'));
});
