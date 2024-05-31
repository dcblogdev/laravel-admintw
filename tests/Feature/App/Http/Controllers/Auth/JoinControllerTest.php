<?php

use App\Models\User;
use Illuminate\Support\Str;

use function Pest\Laravel\assertAuthenticatedAs;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertGuest;
use function Pest\Laravel\get;
use function Pest\Laravel\put;

beforeEach(function () {
    test()->token = Str::random(32);
    test()->ownerUser = User::factory()->create();
});

test('can see join page', function () {
    assertGuest();

    User::factory()->create([
        'invite_token' => $this->token,
        'invited_by' => $this->ownerUser->id,
        'invited_at' => now(),
    ]);

    get(route('join', $this->token))->assertOk();
});

test('cannot see join page when logged in', function () {
    $this->authenticate();

    get(route('join', $this->token))
        ->assertRedirect(route('dashboard'));
});

test('can join with password', function () {

    $user = User::factory()->create([
        'invite_token' => $this->token,
        'invited_by' => $this->ownerUser->id,
        'invited_at' => now(),
    ]);

    $password = 'ght73A3!$^DS';

    put(route('join.update', $user->id), [
        'newPassword' => $password,
        'confirmPassword' => $password,
        'name' => $user->name,
    ])->assertRedirect(route('dashboard'));

    $user = User::find($user->id);

    expect($user->invite_token)->toBeNull()
        ->and($user->last_logged_in_at)->not->toBeNull()
        ->and($user->joined_at)->not->toBeNull()
        ->and($user->email_verified_at)->not->toBeNull();

    assertAuthenticatedAs($user);

    assertDatabaseHas('audit_trails', [
        'user_id' => $user->id,
        'reference_id' => $user->id,
        'title' => 'Joined completed',
        'section' => 'Auth',
        'type' => 'join',
    ]);

});

test('can join and change name', function () {

    $token = Str::random(32);
    $ownerUser = User::factory()->create();

    $user = User::factory()->create([
        'name' => 'bob',
        'invite_token' => $token,
        'invited_by' => $ownerUser->id,
        'invited_at' => now(),
    ]);

    $password = 'ght73A3!$^DS';

    put(route('join.update', $user->id), [
        'newPassword' => $password,
        'confirmPassword' => $password,
        'name' => 'Dave',
    ])->assertRedirect(route('dashboard'));

    $user = User::find($user->id);

    expect($user->invite_token)->toBeNull()
        ->and($user->last_logged_in_at)->not->toBeNull()
        ->and($user->joined_at)->not->toBeNull()
        ->and($user->email_verified_at)->not->toBeNull()
        ->and($user->name)->toBe('Dave');

    assertAuthenticatedAs($user);

    assertDatabaseHas('audit_trails', [
        'user_id' => $user->id,
        'reference_id' => $user->id,
        'title' => 'Joined completed',
        'section' => 'Auth',
        'type' => 'join',
    ]);

});

test('cannot join with no password', function () {

    $user = User::factory()->create([
        'invite_token' => $this->token,
        'invited_by' => $this->ownerUser->id,
        'invited_at' => now(),
    ]);

    put(route('join.update', $user->id), [
        'newPassword' => null,
        'confirmPassword' => null,
        'name' => $user->name,
    ])->assertSessionHasErrors(['newPassword', 'confirmPassword']);

    $user = User::find($user->id);

    expect($user->invite_token)->not->toBeNull()
        ->and($user->last_logged_in_at)->toBeNull()
        ->and($user->joined_at)->toBeNull();

    assertGuest();
    assertDatabaseCount('audit_trails', 0);
});

test('passwords must match', function () {

    $user = User::factory()->create([
        'invite_token' => $this->token,
        'invited_by' => $this->ownerUser->id,
        'invited_at' => now(),
    ]);

    put(route('join.update', $user->id), [
        'newPassword' => '123',
        'confirmPassword' => '456',
        'name' => $user->name,
    ])->assertSessionHasErrors(['newPassword', 'confirmPassword']);

});

test('passwords should be strong', function () {
    $user = User::factory()->create([
        'invite_token' => $this->token,
        'invited_by' => $this->ownerUser->id,
        'invited_at' => now(),
    ]);

    put(route('join.update', $user->id), [
        'newPassword' => '12345678',
        'confirmPassword' => '12345678',
        'name' => $user->name,
    ])->assertSessionHasErrors(['newPassword']);
});
