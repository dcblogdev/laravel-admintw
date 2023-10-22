<?php

test('returns 401 when not authenticated', function () {
    $this->get(route('dashboard'), ['Accept' => 'application/json'])
        ->assertStatus(401);
});
