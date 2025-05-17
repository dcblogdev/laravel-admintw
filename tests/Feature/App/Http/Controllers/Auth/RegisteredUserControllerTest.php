<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Notification;

use function Pest\Laravel\assertGuest;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

test('can see register page', function () {
    get(route('register'))->assertOk();
});

test('users cannot register with invalid password', function () {
    post(route('register'), [
        'name' => fake()->name(),
        'email' => fake()->email(),
        'password' => '',
    ]);

    assertGuest();
});

test('users cannot register with existing email', function () {
    $user = User::factory()->create();
    $password = 'ght73A3!$^DS';

    post(route('register'), [
        'name' => fake()->name(),
        'email' => $user->email,
        'password' => $password,
        'confirmPassword' => $password,
    ])->assertInvalid();

    assertGuest();
});

test('users cannot register without matching password', function () {
    $user = User::factory()->create();
    $password = 'ght73A3!$^DS';

    post(route('register'), [
        'name' => fake()->name(),
        'email' => $user->email,
        'password' => $password,
        'confirmPassword' => 'other',
    ])->assertInvalid();

    assertGuest();
});

test('users can register', function () {
    // Role::firstOrCreate(['name' => 'admin', 'label' => 'Admin']);
    $password = 'ght73A3!$^DS';
    $email = fake()->email();

    post(route('register'), [
        'name' => fake()->name(),
        'email' => $email,
        'password' => $password,
        'confirmPassword' => $password,
    ])->assertValid()
        ->assertRedirect();

    $user = User::where('email', $email)->first();

    expect($user->hasRole('admin'))->toBeTrue();
});

test('users can register multiple times', function () {
    // first user
    post(route('register'), [
        'name' => fake()->name(),
        'email' => fake()->email(),
        'password' => 'ght73A3!$^DS',
        'confirmPassword' => 'ght73A3!$^DS',
    ]);

    // second user
    post(route('register'), [
        'name' => fake()->name(),
        'email' => fake()->email(),
        'password' => 'ght73A3!$^DS',
        'confirmPassword' => 'ght73A3!$^DS',
    ])
        ->assertValid()
        ->assertRedirect();

    expect(User::count())->toBe(2);
});

test('users can register and receive only one email verification notification', function () {
    Notification::fake();

    $password = 'ght73A3!$^DS';
    $email = fake()->email();

    post(route('register'), [
        'name' => fake()->name(),
        'email' => $email,
        'password' => $password,
        'confirmPassword' => $password,
    ])->assertValid()
        ->assertRedirect();

    $user = User::where('email', $email)->first();

    Notification::assertSentTo(
        [$user],
        VerifyEmail::class,
        1
    );

    expect($user->hasVerifiedEmail())->toBeFalse();
});
