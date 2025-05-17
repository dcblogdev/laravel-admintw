<?php

declare(strict_types=1);

use function Pest\Laravel\get;

get('/')->assertOk();

describe('authenticated', function () {

    beforeEach(function () {
        $this->authenticate();
    });

    test('can see dashboard text on welcome page when logged in', function () {
        get('/')->assertSeeText(__('Dashboard'));
    });

});

describe('guest', function () {

    test('can see login text on welcome page', function () {
        get('/')
            ->assertSeeText(__('Login'))
            ->assertSeeText(__('Register'));
    });

});
