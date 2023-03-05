<?php

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
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
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
            if ($this->user()->two_fa_active === 'Yes' && $this->user()->two_fa_secret_key !== '') {
                session(['2fa-login' => true]);
            } else {
                session(['2fa-setup' => true]);
            }
        } else {
            if ($this->user()->two_fa_active === 'Yes' && $this->user()->two_fa_secret_key !== '') {
                session(['2fa-login' => true]);
            }
        }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
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

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('email')).'|'.$this->ip());
    }
}
