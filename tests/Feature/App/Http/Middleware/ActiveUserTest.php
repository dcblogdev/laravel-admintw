<?php

use App\Http\Middleware\ActiveUser;
use Illuminate\Http\Request;

test('redirects when user is not active', function () {
    $this->authenticate();

    auth()->user()->update(['is_active' => false]);

    $request = Request::create(route('dashboard'));

    $response = (new ActiveUser)->handle($request, function () {});

    expect($response->getStatusCode())->toBe(302);
});

test('redirected when 2fa login session exists', function () {
    $this->authenticate();

    $this->withSession(['2fa-login' => true]);

    $request = Request::create(route('dashboard'));

    $response = (new ActiveUser)->handle($request, function () {});

    expect($response->getStatusCode())->toBe(302);
});

test('redirected when 2fa setup session exists', function () {
    $this->authenticate();

    $this->withSession(['2fa-setup' => true]);

    $request = Request::create(route('dashboard'));

    $response = (new ActiveUser)->handle($request, function () {});

    expect($response->getStatusCode())->toBe(302);
});
