<?php

declare(strict_types=1);

namespace App\Http\Requests\Auth;

use App\Models\AuditTrail;
use App\Models\Setting;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
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
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        if (! Auth::attempt([
            'email' => $this->input('email'),
            'password' => $this->input('password'),
            'is_active' => 1,
        ], $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        AuditTrail::create([
            'user_id' => $this->user()->id,
            'reference_id' => $this->user()->id,
            'title' => 'Logged in',
            'section' => 'Auth',
            'type' => 'Login',
        ]);

        $this->user()->last_logged_in_at = now();
        $this->user()->save();

        $isForced2Fa = Setting::where('key', 'is_forced_2fa')->value('value');

        if ($isForced2Fa) {
            if ($this->user()->two_fa_active === true && $this->user()->two_fa_secret_key !== '') {
                session(['2fa-login' => true]);
            } else {
                session(['2fa-setup' => true]);
            }
        } else {
            if ($this->user()->two_fa_active === true && $this->user()->two_fa_secret_key !== '') {
                session(['2fa-login' => true]);
            }
        }

        RateLimiter::clear($this->throttleKey());
    }

    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('email')).'|'.$this->ip());
    }
}
