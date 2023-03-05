<?php

use App\Models\Notification;
use App\Models\User;

test('a notification belongs to a user with assigned to', function () {
    $user = User::factory()->create();
    $notification = Notification::factory()->create([
        'assigned_from_user_id' => $user->id,
        'assigned_to_user_id' => $user->id,
    ]);

    expect($notification->assigned_to_user_id)->toEqual($user->id);
    $this->assertInstanceOf(User::class, $notification->assignedTo);
});

test('a notification belongs to a user with assigned from', function () {
    $user = User::factory()->create();
    $notification = Notification::factory()->create([
        'assigned_from_user_id' => $user->id,
        'assigned_to_user_id' => $user->id,
    ]);

    expect($notification->assigned_from_user_id)->toEqual($user->id);
    $this->assertInstanceOf(User::class, $notification->assignedFrom);
});
