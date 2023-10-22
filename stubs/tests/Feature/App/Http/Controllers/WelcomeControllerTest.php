<?php

test('can load welcome', function () {
    $this->get('/')->assertOk();
});
