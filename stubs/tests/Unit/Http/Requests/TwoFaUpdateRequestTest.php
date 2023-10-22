<?php

use App\Http\Requests\TwoFaUpdateRequest;

beforeEach(function () {
    $this->requestData = new TwoFaUpdateRequest();
});

test('rules', function () {
    $this->assertEquals([
        'code' => [
            'required',
            'string',
            'min:6',
        ],
    ],
        $this->requestData->rules()
    );
});

test('authenticate', function () {
    $this->assertTrue($this->requestData->authorize());
});
