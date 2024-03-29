<?php

use App\Models\Setting;
use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Event;

use function Pest\Laravel\assertAuthenticated;
use function Pest\Laravel\assertGuest;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

test('login screen can be rendered', function () {
    get(route('login'))->assertOk();
});

test('users can authenticate using the login screen', function () {
    $user = User::factory()->create();

    post(route('login'), [
        'email' => $user->email,
        'password' => 'password',
    ])
        ->assertRedirect(route('dashboard'));

    assertAuthenticated();
});

test('users can not authenticate with invalid password', function () {
    $user = User::factory()->create();

    post(route('login'), [
        'email' => $user->email,
        'password' => 'wrong-password',
    ])
        ->assertInvalid();

    assertGuest();
});

test('can logout', function () {
    $this->authenticate();

    post(route('logout'))
        ->assertRedirect('/');

    assertGuest();
});

test('creates a session called 2fa-login on login when 2fa is forced', function () {

    $user = User::factory()->create([
        'two_fa_active' => true,
        'two_fa_secret_key' => '123456',
    ]);

    Setting::create([
        'key' => 'is_forced_2fa',
        'value' => true,
    ]);

    post(route('login'), [
        'email' => $user->email,
        'password' => 'password',
    ])
        ->assertRedirect(route('dashboard'))
        ->assertSessionHas('2fa-login');

    assertAuthenticated();
});

test('creates a session called 2fa-setup on login when 2fa is forced and 2fa not setup for user', function () {

    $user = User::factory()->create([
        'two_fa_active' => false,
        'two_fa_secret_key' => null,
    ]);

    Setting::create([
        'key' => 'is_forced_2fa',
        'value' => true,
    ]);

    post(route('login'), [
        'email' => $user->email,
        'password' => 'password',
    ])
        ->assertRedirect(route('dashboard'))
        ->assertSessionHas('2fa-setup');

    assertAuthenticated();
});

test('creates a session called 2fa-login on login when 2fa is setup on user', function () {

    $user = User::factory()->create([
        'two_fa_active' => true,
        'two_fa_secret_key' => '123456',
    ]);

    post(route('login'), [
        'email' => $user->email,
        'password' => 'password',
    ])
        ->assertRedirect(route('dashboard'))
        ->assertSessionHas('2fa-login');

    assertAuthenticated();
});

test('too many login attempts', function () {

    $user = User::factory()->create();

    Event::fake();

    post(route('login'), [
        'email' => $user->email,
        'password' => 'wrong-password',
    ])
        ->assertInvalid();

    post(route('login'), [
        'email' => $user->email,
        'password' => 'wrong-password',
    ])
        ->assertInvalid();

    post(route('login'), [
        'email' => $user->email,
        'password' => 'wrong-password',
    ])
        ->assertInvalid();

    post(route('login'), [
        'email' => $user->email,
        'password' => 'wrong-password',
    ])
        ->assertInvalid();

    post(route('login'), [
        'email' => $user->email,
        'password' => 'wrong-password',
    ])
        ->assertInvalid();

    post(route('login'), [
        'email' => $user->email,
        'password' => 'wrong-password',
    ])
        ->assertInvalid()
        ->assertSessionHasErrors('email', 'auth.throttle');

    Event::assertDispatched(Lockout::class);

});
