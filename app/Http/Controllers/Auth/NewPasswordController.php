<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewPasswordRequest;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    public function create(Request $request): Application|View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    public function store(NewPasswordRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $user = User::where('email', $data['email'])->firstOrFail();
        $user->password = Hash::make($data['password']);
        $user->remember_token = Str::random(60);
        $user->save();

        event(new PasswordReset($user));

        $status = Password::PASSWORD_RESET;

        return redirect()->route('login')->with('status', __($status));
    }
}
