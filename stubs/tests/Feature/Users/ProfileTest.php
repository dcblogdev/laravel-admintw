<?php

use App\Models\User;

test('can see profile')
    ->authenticate()
    ->get(fn() => route('admin.users.show', User::factory()->create()))
    ->assertOk();