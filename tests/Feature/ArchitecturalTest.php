<?php

use App\Http\Controllers\Controller;

describe('Architectural Tests', function () {
    test('globals')
        ->expect(['dd', 'dump', 'ray', 'env', 'var_dump', 'print_r', 'var_export', 'die'])
        ->not->toBeUsed();

    test('traits')
        ->expect('App\Models\Traits')
        ->toBeTraits();

    test('strict types')
        ->expect('App')
        ->toUseStrictTypes();

    test('value objects')
        ->expect('App\ValueObjects')
        ->toBeReadOnly()
        ->not->toBeFinal()
        ->toExtendNothing()
        ->toImplementNothing();

    test('controllers')
        ->expect('App\Http\Controllers')
        ->toHaveSuffix('Controller')
        ->classes->not->toBeFinal()
        ->classes->toExtend(Controller::class)
        ->toImplementNothing();
});
