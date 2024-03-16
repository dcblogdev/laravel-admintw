<?php

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

use function PHPUnit\Framework\assertInstanceOf;

test('can get route', function () {
    $user = User::factory()->create();

    $expected = url(route('admin.users.show', $user->id));
    expect($expected)->toEqual($user->route($user->id));
});

test('has isActive scope', function () {
    assertInstanceOf(Builder::class, User::isActive());
});

test('isOwner returns true for tenant owner', function () {
    $user = User::factory()->create();

    expect($user->isOwner())->toEqual(true);
});

test('has tenant', function () {
    $user = User::factory()->create();

    assertInstanceOf(BelongsTo::class, $user->tenant());
});

test('has invite', function () {
    $user = User::factory()->create();

    assertInstanceOf(HasOne::class, $user->invite());
});

test('isOwner returns false for tenant owner', function () {

    $user = User::factory()->create();
    expect($user->isOwner())->toEqual(true);

    $secondUser = User::create([
        'tenant_id' => $user->tenant_id,
        'name' => 'Test User',
        'slug' => 'test-user',
        'email' => 'user@domain.com',
    ]);

    expect($secondUser->isOwner())->toEqual(false);
});
