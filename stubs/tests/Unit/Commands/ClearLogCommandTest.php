<?php

test('can clear log', function () {
    $this->artisan('log:clear')
        ->expectsOutput('Logged cleared');
});
