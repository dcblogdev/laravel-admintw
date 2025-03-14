<?php

use function Pest\Laravel\get;

test('returns 401 when not authenticated', function () {
    get(route('dashboard'), ['Accept' => 'application/json'])
        ->assertUnauthorized();
});
