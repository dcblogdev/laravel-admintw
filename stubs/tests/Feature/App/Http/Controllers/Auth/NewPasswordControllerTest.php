<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;

test('can view forgotten password page', function () {
    $this->assertGuest();

    $this->get(route('password.reset', 'token'))->assertOk();
});

test('cannot view forgotten password page when logged in', function () {
    $this->authenticate();
    $this->get(route('password.reset', 'token'))->assertRedirect(route('dashboard'));
});

test('resetting a password populates password_reset_tokens table', function () {

    $user = User::factory()->create([
        'email_verified_at' => null,
    ]);

    $this->post(route('password.email'), [
        'email' => $user->email,
    ])->assertRedirect('/');

    $this->assertDatabaseHas('password_reset_tokens', [
        'email' => $user->email,
    ]);

});

test('can reset password and redirects', function () {

    $user = User::factory()->create();

    $this->post(route('password.email'), [
        'email' => $user->email,
    ]);

    $token = DB::table('password_reset_tokens')->first();

    $password = 'ght73A3!$^DS';
    $this->post(route('password.store'), [
        'token' => $token->token,
        'email' => $user->email,
        'password' => $password,
        'password_confirmation' => $password,
    ])->assertRedirect('/');
});

test('can reset password and updated user table', function () {

    $user = User::factory()->create();

    $this->post(route('password.email'), [
        'email' => $user->email,
    ]);

    $token = DB::table('password_reset_tokens')->first();

    $password = 'ght73A3!$^DS';
    $this->post(route('password.store'), [
        'token' => $token->token,
        'email' => $user->email,
        'password' => $password,
        'password_confirmation' => $password,
    ]);

    $user = User::find($user->id);

    expect($user->remember_token)->not->toBeNull()
        ->and($user->password)->not->toBeNull();
});
