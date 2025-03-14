<?php

use App\Models\User;
use Mockery\MockInterface;
use RobThree\Auth\TwoFactorAuth;

use function Pest\Laravel\get;
use function Pest\Laravel\post;

beforeEach(function () {
    $this->user = $this->authenticate();
});

test('redirects when 2fa has already been verified', function () {
    get(route('admin.2fa'))->assertRedirect(route('dashboard'));
});

test('renders when 2fa has not been verified', function () {
    session(['2fa-login' => true]);
    get(route('admin.2fa'))->assertOk();
});

test('validates code is required on update', function () {
    session(['2fa-login' => true]);
    post(route('admin.2fa'), [])->assertSessionHasErrors('code');
});

test('validates code validates code is too short', function () {
    session(['2fa-login' => true]);
    post(route('admin.2fa'), ['code' => 12345])->assertSessionHasErrors('code');
});

test('validates code validates code is a string', function () {
    session(['2fa-login' => true]);
    post(route('admin.2fa'), ['code' => 123456])->assertSessionHasErrors('code');
});

test('can use 2fa code and redirects', function () {
    session(['2fa-login' => true]);

    $this->mock(TwoFactorAuth::class, function (MockInterface $mock) {
        $mock
            ->shouldReceive('verifyCode')
            ->andReturn(true);
    });

    auth()->user()->update(['two_fa_secret_key' => 'VMR466AB62ZBOKHE']);

    post(route('admin.2fa'), ['code' => '123456'])
        ->assertRedirect(route('dashboard'));
});

test('cannot use invalid 2fa code that is too short', function () {
    session(['2fa-login' => true]);

    post(route('admin.2fa'), ['code' => '12345'])
        ->assertSessionHasErrors('code');
});

test('cannot use invalid 2fa code', function () {
    session(['2fa-login' => true]);

    post(route('admin.2fa'), ['code' => '123456'])
        ->assertInvalid();
});

test('can see 2fa setup page', function () {
    get(route('admin.2fa-setup'))->assertOk();
});

test('code is required for update', function () {
    post(route('admin.2fa-setup.update'), [])
        ->assertSessionHasErrors('code');
});

test('code has to be at least 6 chars for update', function () {
    post(route('admin.2fa-setup.update'), ['code' => '12345'])
        ->assertSessionHasErrors('code');
});

test('can update', function () {

    $this->mock(TwoFactorAuth::class, function (MockInterface $mock) {
        $mock
            ->shouldReceive('verifyCode')
            ->andReturn(true);
    });

    $this->post(route('admin.2fa-setup.update'), [
        'secretKey' => '123789',
        'code' => '123457',
    ])
        ->assertValid()
        ->assertRedirect(route('dashboard'));

    $user = User::find(auth()->user()->id);

    expect($user->two_fa_active)->toBe(true)
        ->and($user->two_fa_secret_key)->not->toBeNull();

    $this->assertDatabaseHas('audit_trails', [
        'user_id' => $user->id,
        'reference_id' => $user->id,
        'title' => 'setup 2FA complete',
        'section' => 'Auth',
        'type' => '2FA Setup',
    ]);
});

test('cannot update', function () {

    $this->post(route('admin.2fa-setup.update'), [
        'secretKey' => 'VMR466AB62ZBOKHE',
        'code' => '234',
    ])->assertInvalid();

    $user = User::find(auth()->user()->id);

    expect($user->two_fa_active)->toBe(false)
        ->and($user->two_fa_secret_key)->toBeNull();

    $this->assertDatabaseHas('audit_trails', [
        'user_id' => $user->id,
        'reference_id' => $user->id,
        'title' => 'failed 2FA setup, code invalid',
        'section' => 'Auth',
        'type' => '2FA Setup',
    ]);
});
