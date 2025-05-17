<?php

declare(strict_types=1);

use App\Actions\GetInitialsAction;

test('can get initials', function (?string $value, string $expected) {
    $initials = app(GetInitialsAction::class)($value);

    expect($initials)->toBe($expected);
})->with([
    ['John Doe', 'JD'],
    ['john doe', 'JD'],
    ['John James Doe', 'JD'],
    ['john james doe', 'JD'],
    ['John', 'J'],
    ['john', 'J'],
    [null, ''],
    ['', ''],
]);
