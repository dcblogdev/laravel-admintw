<?php

use function Pest\Laravel\get;

get('/')->assertOk();

describe('authenticated', function () {

    beforeEach(function () {
        $this->authenticate();
    });

    test('can see dashboard text on welcome page when logged in', function () {
        get('/')->assertSeeText('Dashboard');
    });

});

describe('guest', function () {

    test('can see login text on welcome page', function () {
        get('/')
            ->assertSeeText('Login')
            ->assertSeeText('Register');
    });

});
