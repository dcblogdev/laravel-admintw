<?php

use App\Http\Controllers\Controller;

test('globals')
    ->expect(['dd', 'dump', 'ray', 'var_dump'])
    ->not->toBeUsed();

test('traits')
    ->expect('App\Models\Traits')
    ->toBeTraits();

test('controllers')
    ->expect('App\Http\Controllers')
    ->toUseStrictTypes()
    ->toHaveSuffix('Controller')
    ->toBeClasses()
    ->classes->not->toBeFinal()
    ->classes->toExtend(Controller::class);
