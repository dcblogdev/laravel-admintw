<?php

use App\Models\User;

test('can see change password')
    ->authenticate()
    ->get(fn() => route('admin.users.edit', User::factory()->create()))
        ->assertOk();

