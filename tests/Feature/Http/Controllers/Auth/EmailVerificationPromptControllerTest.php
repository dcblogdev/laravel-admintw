<?php

use App\Models\User;

use function Pest\Laravel\get;

test('email verification screen can be rendered', function () {
    $user = User::factory()->create([
        'email_verified_at' => null,
    ]);

    $this
        ->actingAs($user)
        ->get(route('verification.notice'))
        ->assertOk();
});

test('verify-email redirects', function () {
    $this->authenticate();

    get(route('verification.notice'))
        ->assertRedirect(route('dashboard'));
});
