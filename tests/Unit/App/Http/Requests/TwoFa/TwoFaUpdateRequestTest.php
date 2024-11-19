<?php

use App\Http\Requests\TwoFa\TwoFaUpdateRequest;

beforeEach(function () {
    $this->requestData = new TwoFaUpdateRequest;
});

test('rules', function () {
    $rules = [
        'code' => [
            'required',
            'string',
            'min:6',
        ],
    ];

    $this->assertEquals($rules, test()->requestData->rules());
});

test('authenticate', function () {
    $this->assertTrue(test()->requestData->authorize());
});
