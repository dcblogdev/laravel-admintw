<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AuditTrail;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected string $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->email() => 'required|email',
            'password'     => 'required|string',
        ]);
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            [
                'email'     => $request->input('email'),
                'password'  => $request->input('password'),
                'is_active' => 1
            ],
            $request->filled('remember')
        );
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->email(), 'password');
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->intended($this->redirectPath());
    }

    protected function authenticated(Request $request, $user)
    {
        AuditTrail::create([
            'user_id'      => $user->id,
            'reference_id' => $user->id,
            'title'        => "Logged in",
            'section'      => 'Auth',
            'type'         => 'Login'
        ]);

        $user->last_logged_in_at = now();
        $user->save();

        $isForced2Fa = Setting::where('key', 'is_forced_2fa')->value('value');

        if ($isForced2Fa) {
            if ($user->two_fa_active === 'Yes' && $user->two_fa_secret_key !== '') {
                session(['2fa-login' => true]);
            } else {
                session(['2fa-setup' => true]);
            }
        } else {
            if ($user->two_fa_active === 'Yes' && $user->two_fa_secret_key !== '') {
                session(['2fa-login' => true]);
            }
        }
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $user = User::where($this->username(), $request->input($this->username()))->first();
        $id   = $user !== null ? $user->id : null;

        AuditTrail::create([
            'user_id'      => $id,
            'reference_id' => $id,
            'title'        => "Login Failed - ".$request->input($this->username()),
            'section'      => 'Auth',
            'type'         => 'login'
        ]);

        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    public function email()
    {
        return 'email';
    }

    public function logout(Request $request)
    {
        AuditTrail::create([
            'user_id'      => auth()->id(),
            'reference_id' => auth()->id(),
            'title'        => "Logged out",
            'section'      => 'Auth',
            'type'         => 'Logout'
        ]);

        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect()->route('admin');
    }

    protected function guard()
    {
        return Auth::guard();
    }

    protected function hasTooManyLoginAttempts(Request $request)
    {
        $attempts       = 10;
        $lockoutMinites = 10;
        return $this->limiter()->tooManyAttempts(
            $this->throttleKey($request),
            $attempts,
            $lockoutMinites
        );
    }
}
