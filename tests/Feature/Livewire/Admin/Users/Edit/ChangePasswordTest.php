<?php

use App\Livewire\Admin\Users\Edit\ChangePassword;
use App\Models\User;
use Livewire\Livewire;

test('can see change password', function () {
    $this->authenticate();

    $user = User::factory()->create();
    $this
        ->get(route('admin.users.edit', $user))
        ->assertOk();
});

test('can change password', function () {
    $password = 'ght73A3!$^DS';
    Livewire::test(ChangePassword::class, ['user' => User::factory()->create()])
        ->set('newPassword', $password)
        ->set('confirmPassword', $password)
        ->call('update')
        ->assertHasNoErrors('password')
        ->assertHasNoErrors('confirmPassword');
});

test('password cannot be empty', function () {
    Livewire::test(ChangePassword::class)
        ->set('newPassword', '')
        ->call('update')
        ->assertHasErrors('newPassword');
});

test('password must match', function () {
    Livewire::test(ChangePassword::class)
        ->set('newPassword', 'rr4wfdc')
        ->set('confirmPassword', '7632vvds2')
        ->call('update')
        ->assertHasErrors(['newPassword', 'confirmPassword']);
});
