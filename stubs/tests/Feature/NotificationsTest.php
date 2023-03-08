<?php

use App\Http\Livewire\Admin\NotificationsMenu;
use function Pest\Livewire\livewire;

beforeEach(function () {
    $this->authenticate();
});

test('can see notification', function() {
    livewire(NotificationsMenu::class)
        ->assertSet('unseenCount', 0);
});