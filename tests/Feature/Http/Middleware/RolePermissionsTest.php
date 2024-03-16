<?php

use App\Http\Middleware\RolePermissions;

test('redirects when user is not active', function () {
    $this->authenticate();

    $request = Request::create(route('dashboard'));

    $response = (new RolePermissions())->handle($request, function () {
    });

    expect($response)->toBeNull();
});
