<?php

test('can run db:build', function () {
    $this->artisan('db:build')
        ->expectsOutput('This command is disabled on production.');
});
