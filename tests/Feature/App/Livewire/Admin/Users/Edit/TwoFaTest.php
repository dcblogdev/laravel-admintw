<?php

declare(strict_types=1);

use App\Livewire\Admin\Users\Edit\TwoFactorAuthentication;
use App\Models\User;
use Livewire\Livewire;
use RobThree\Auth\TwoFactorAuth;

beforeEach(function () {
    $this->authenticate();
});

test('can set property', function () {
    $this
        ->get(route('admin.users.edit', User::factory()->create()))
        ->assertSeeLivewire('admin.users.edit.two-factor-authentication');
});

test('verify code is required', function () {
    Livewire::test(TwoFactorAuthentication::class, ['user' => auth()->user()])
        ->set('code', '')
        ->call('update')
        ->assertSee('Please enter the code from your authenticator app')
        ->assertHasErrors('code');
});

test('verify code is too short', function () {
    Livewire::test(TwoFactorAuthentication::class, ['user' => auth()->user()])
        ->set('code', '12345')
        ->call('update')
        ->assertSee('The code field must be at least 6 characters.')
        ->assertHasErrors('code');
});

test('verify code is wrong', function () {
    Livewire::test(TwoFactorAuthentication::class, ['user' => auth()->user()])
        ->set('code', '123456')
        ->call('update')
        ->assertSee('Code is invalid please scan the barcode again and enter the code.')
        ->assertHasErrors('code');
});

test('cannot use secret as code', function () {

    $tfa = new TwoFactorAuth;
    $secretKey = $tfa->createSecret();

    Livewire::test(TwoFactorAuthentication::class, ['user' => auth()->user()])
        ->set('code', $secretKey)
        ->call('update')
        ->assertSee('Code is invalid please scan the barcode again and enter the code.')
        ->assertHasErrors('code');
});

test('can use code', function () {

    $mock = Mockery::mock(TwoFactorAuth::class);
    $mock->shouldReceive('verifyCode')->andReturn(true);
    $mock->shouldReceive('createSecret')->andReturn('123456');
    $mock->shouldReceive('getQRCodeImageAsDataUri')->andReturn('data:image/png;base64,123456');

    // Bind the mock instance into the service container
    app()->instance(TwoFactorAuth::class, $mock);

    Livewire::test(TwoFactorAuthentication::class, ['user' => auth()->user()])
        ->set('code', '123456')
        ->call('update')
        ->assertHasNoErrors();
});

test('can remove 2fa', function () {
    Livewire::test(TwoFactorAuthentication::class, ['user' => auth()->user()])
        ->call('remove')
        ->assertOk();

    expect(auth()->user()->two_fa_active)->toBeFalse()
        ->and(auth()->user()->two_fa_secret_key)->toBeNull();
});
