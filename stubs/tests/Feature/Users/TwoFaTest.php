<?php

use App\Models\User;

test('can see two fa')
    ->authenticate()
    ->get(fn() => route('admin.users.edit', User::factory()->create()))
    ->assertSeeLivewire('admin.users.edit.two-factor-authentication');