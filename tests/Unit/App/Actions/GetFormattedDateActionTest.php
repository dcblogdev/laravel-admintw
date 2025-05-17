<?php

declare(strict_types=1);

use App\Actions\GetFormattedDateAction;

test('date is a carbon instance', function () {
    $date = app(GetFormattedDateAction::class)(now());
    expect($date)->toBe(date('Y-m-d'));
});

test('date is a string string', function () {
    $date = app(GetFormattedDateAction::class)('13-07-2024');
    expect($date)->toBe('2024-07-13');
});

test('handles no date', function () {
    $date = app(GetFormattedDateAction::class)(null);
    expect($date)->toBe('');
});
