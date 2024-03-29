<?php

use function Pest\Laravel\artisan;

test('can clear log', function () {
    artisan('log:clear')
        ->expectsOutput('Logged cleared');
});
