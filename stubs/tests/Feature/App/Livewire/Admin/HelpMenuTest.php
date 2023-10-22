<?php

use App\Livewire\Admin\HelpMenu;
use Livewire\Livewire;

beforeEach(function () {
    $this->authenticate();
});

test('can see help menu', function () {
    $this
        ->get(route('dashboard'))
        ->assertSeeLivewire(HelpMenu::class);
});

test('can see help menu item', function () {
    Livewire::test(HelpMenu::class)
        ->assertSee('Theme Docs');
});
