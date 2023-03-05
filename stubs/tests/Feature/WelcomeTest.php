<?php

test('can see welcome page', function () {
    $this->get('/')->assertOk();
});

test('can see log in text on welcome page', function () {
    $this->get('/')->assertSeeText('Log in');
});

test('can see dashboard text on welcome page when logged in', function () {
    $this->authenticate()->get('/')->assertSeeText('Dashboard');
});
