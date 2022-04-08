<?php

use function Pest\Laravel\get;

test('can see welcome page', function () {
    get('/')->assertOk();
});

test('can see log in text on welcome page', function () {
    get('/')->assertSeeText('Log in');
});

test('can see dashboard text on welcome page when logged in', function () {
    authenticate()->get('/')->assertSeeText('Dashboard');
});
