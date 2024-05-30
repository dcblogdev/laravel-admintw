<?php

use App\Enums\Country;

test('Can get country', function () {
    $country = Country::United_Kingdom;

    expect($country)
        ->name->toBe('United_Kingdom')
        ->value->toBe('GB');
});

test('Can get country by name', function () {
    $country = Country::United_Kingdom->name;

    expect($country)->toBe('United_Kingdom');
});

test('Can get country by value', function () {
    $country = Country::United_Kingdom->value;

    expect($country)->toBe('GB');
});

test('label to include spaces', function () {
    $country = Country::United_Kingdom;

    expect($country->label())->toBe('United Kingdom');
});
