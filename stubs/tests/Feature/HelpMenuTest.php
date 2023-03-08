<?php

use App\Http\Livewire\Admin\HelpMenu;
use function Pest\Livewire\livewire;

beforeEach(function () {
    $this->authenticate();
});

test('can see help menu', function () {
    $this
        ->get(route('dashboard'))
        ->assertSeeLivewire(HelpMenu::class);
});

test('can see help menu item', function() {
    livewire(HelpMenu::class)
        ->assertSee('Theme Docs');
});