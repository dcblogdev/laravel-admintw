<?php

declare(strict_types=1);

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;
use RobThree\Auth\TwoFactorAuth;
use RobThree\Auth\TwoFactorAuthException;

class TwoFactorCodeRule implements ValidationRule
{
    protected TwoFactorAuth $twoFactorAuth;

    public function __construct(TwoFactorAuth $twoFactorAuth)
    {
        $this->twoFactorAuth = $twoFactorAuth;
    }

    /**
     * Run the validation rule.
     *
     * @param  Closure(string): PotentiallyTranslatedString  $fail
     *
     * @throws TwoFactorAuthException
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $valid = $this->twoFactorAuth->verifyCode($this->twoFactorAuth->createSecret(), $value);

        if ($valid === false) {
            $fail('Code is invalid please scan the barcode again and enter the code.');
        }
    }
}
