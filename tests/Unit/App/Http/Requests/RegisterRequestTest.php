<?php

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Validation\Rules\Password;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertTrue;

beforeEach(function () {
    $this->registrationData = new RegisterRequest;
});

test('rules', function () {
    $rules = [
        'name' => [
            'required',
            'string',
            'max:255',
        ],
        'email' => [
            'required',
            'string',
            'email',
            'unique:'.User::class,
        ],
        'password' => [
            'required',
            'string',
            Password::defaults(),
        ],
        'confirmPassword' => [
            'required',
            'string',
            'same:password',
        ],
    ];

    assertEquals($rules, test()->registrationData->rules());
});

test('messages', function () {
    $messages = [
        'password.required' => 'Password is required',
        'password.uncompromised' => 'The given new password has appeared in a data leak by https://haveibeenpwned.com please choose a different new password. ',
        'confirmPassword.required' => 'Confirm password is required',
        'confirmPassword.same' => 'Confirm password and new password must match',
    ];

    assertEquals($messages, test()->registrationData->messages());
});

test('authenticate', function () {
    assertTrue(test()->registrationData->authorize());
});
