<?php

use App\Models\User;

test('can get route', function () {
    $user = User::factory()->create();

    $expected = url('admin/users/'.$user->id);
    expect($expected)->toEqual($user->route($user->id));
});
