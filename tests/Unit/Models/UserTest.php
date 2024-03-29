<?php

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
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

test('has invite', function () {
    $user = User::factory()->create();

    assertInstanceOf(HasOne::class, $user->invite());
});
