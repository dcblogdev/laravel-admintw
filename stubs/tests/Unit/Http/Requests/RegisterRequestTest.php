<?php

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Validation\Rules\Password;

beforeEach(function () {
    $this->registrationData = new RegisterRequest();
});

test('rules', function () {
    $this->assertEquals([
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
    ],
        $this->registrationData->rules()
    );
});

test('messages', function () {
    $this->assertEquals([
        'password.required' => 'Password is required',
        'password.uncompromised' => 'The given new password has appeared in a data leak by https://haveibeenpwned.com please choose a different new password. ',
        'confirmPassword.required' => 'Confirm password is required',
        'confirmPassword.same' => 'Confirm password and new password must match',
    ],
        $this->registrationData->messages()
    );
});

test('authenticate', function () {
    $this->assertTrue($this->registrationData->authorize());
});
