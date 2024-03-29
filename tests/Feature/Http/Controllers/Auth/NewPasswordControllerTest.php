<?php

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertGuest;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

test('can view forgotten password page', function () {
    assertGuest();

    get(route('password.reset', 'token'))
        ->assertOk();
});

test('cannot view forgotten password page when logged in', function () {
    $this->authenticate();

    get(route('password.reset', 'token'))
        ->assertRedirect(route('dashboard'));
});

test('resetting a password populates password_reset_tokens table', function () {

    $user = User::factory()->create([
        'email_verified_at' => null,
    ]);

    post(route('password.email'), [
        'email' => $user->email,
    ])->assertRedirect('/');

    assertDatabaseHas('password_reset_tokens', [
        'email' => $user->email,
    ]);

});

test('can reset password and redirects', function () {

    $user = User::factory()->create();

    Event::fake();

    post(route('password.email'), [
        'email' => $user->email,
    ]);

    $token = DB::table('password_reset_tokens')->first();

    $password = 'ght73A3!$^DS';
    post(route('password.store'), [
        'token' => $token->token,
        'email' => $user->email,
        'password' => $password,
        'password_confirmation' => $password,
    ])->assertRedirect('login');

    Event::assertDispatched(PasswordReset::class);
});

test('can reset password and updated user table', function () {

    $user = User::factory()->create();

    post(route('password.email'), [
        'email' => $user->email,
    ]);

    $token = DB::table('password_reset_tokens')->first();

    $password = 'ght73A3!$^DS';
    post(route('password.store'), [
        'token' => $token->token,
        'email' => $user->email,
        'password' => $password,
        'password_confirmation' => $password,
    ]);

    $user = User::find($user->id);

    expect($user->remember_token)->not->toBeNull()
        ->and($user->password)->not->toBeNull();
});
