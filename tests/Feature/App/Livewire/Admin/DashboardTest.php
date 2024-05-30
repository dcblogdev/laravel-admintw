<?php

test('can see dashboard as admin regardless of permission', function () {
    $this->authenticate();
    $this->get(route('dashboard'))->assertOk();
});

test('can see dashboard with a none admin role as long as has permission', function () {
    $this->authenticate('editor', 'view_dashboard');
    $this->get(route('dashboard'))->assertOk();
});

test('cannot see dashboard without permission', function () {
    $this->authenticate('editor');
    $this->get(route('dashboard'))->assertStatus(403);
});
