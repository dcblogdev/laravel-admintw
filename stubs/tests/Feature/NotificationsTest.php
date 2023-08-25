<?php

use App\Livewire\Admin\NotificationsMenu;
use Livewire\Livewire;

beforeEach(function () {
    $this->authenticate();
});

test('can see notification', function () {
    Livewire::test(NotificationsMenu::class)
        ->assertSet('unseenCount', 0);
});
