<?php

declare(strict_types=1);

namespace App\Http\Requests\TwoFa;

use Illuminate\Foundation\Http\FormRequest;

class TwoFaUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'code' => [
                'required',
                'string',
                'min:6',
            ],
        ];
    }
}
