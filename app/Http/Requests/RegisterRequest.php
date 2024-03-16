<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, Password|string|null>>
     */
    public function rules(): array
    {
        return [
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
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'password.required' => 'Password is required',
            'password.uncompromised' => 'The given new password has appeared in a data leak by https://haveibeenpwned.com please choose a different new password. ',
            'confirmPassword.required' => 'Confirm password is required',
            'confirmPassword.same' => 'Confirm password and new password must match',
        ];
    }
}
