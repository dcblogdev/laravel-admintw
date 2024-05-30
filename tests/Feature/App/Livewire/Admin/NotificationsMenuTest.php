<?php

use App\Livewire\Admin\NotificationsMenu;
use App\Models\Notification;
use Livewire\Livewire;

test('can see notifications', function () {

    $this->authenticate();
    $user = auth()->user();

    Notification::factory()->create([
        'assigned_to_user_id' => $user->id,
        'assigned_from_user_id' => $user->id,
        'viewed' => 0,
        'viewed_at' => null,
    ]);

    Livewire::test(NotificationsMenu::class)
        ->assertSet('unseenCount', 1)
        ->call('open');

    Livewire::test(NotificationsMenu::class)
        ->call('open')
        ->assertSet('unseenCount', 0);
});
