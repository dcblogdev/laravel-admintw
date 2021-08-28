<?php

use App\Http\Livewire\Users\EditProfile;
use Livewire\Livewire;

test('can see profile', function () {
    $this->authenticate();

    $response = $this->get(route('app.users.edit'));
    $response->assertSeeLivewire('users.edit-profile');
});

test('can confirm profile fields are wired to livewire', function () {
    $user = $this->authenticate();

    Livewire::actingAs($user)
    ->test(EditProfile::class, ['user' => $user])
    ->assertPropertyWired('name')
    ->assertPropertyWired('email');
});

test('can confirm profile has update method wired to livewire', function () {
    $user = $this->authenticate();

    Livewire::actingAs($user)
    ->test(EditProfile::class, ['user' => $user])
    ->assertMethodWired('update');
});
