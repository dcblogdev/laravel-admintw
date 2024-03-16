<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AuditTrail;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class JoinController extends Controller
{
    public function index(string $token): View
    {
        $user = User::where('invite_token', $token)->firstOrFail();

        return view('auth.join', compact('user'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        $request->validate([
            'newPassword' => [
                'required',
                'string',
                Password::default(),
            ],
            'confirmPassword' => 'required|same:newPassword',
        ], [
            'newPassword.required' => 'New password is required',
            'newPassword.uncompromised' => 'The given new password has appeared in a data leak by https://haveibeenpwned.com please choose a different new password. ',
            'confirmPassword.required' => 'Confirm password is required',
            'confirmPassword.same' => 'Confirm password and new password must match',
        ]);

        $user->name = $request->input('name');
        $user->password = Hash::make($request->input('newPassword'));
        $user->is_active = true;
        $user->invite_token = null;
        $user->last_logged_in_at = Carbon::now()->toDateTimeString();
        $user->joined_at = Carbon::now()->toDateTimeString();
        $user->email_verified_at = Carbon::now()->toDateTimeString();
        $user->save();

        //TODO: Remove this after 2fa is implemented
        //        $isForced2Fa = Setting::where('key', 'is_forced_2fa')->value('value');
        //        if ($isForced2Fa) {
        //            session(['2fasetup' => true]);
        //        }

        AuditTrail::create([
            'tenant_id' => $user->tenant_id,
            'user_id' => $user->id,
            'reference_id' => $user->id,
            'title' => 'Joined completed',
            'section' => 'Auth',
            'type' => 'join',
        ]);

        auth()->loginUsingId($user->id, true);

        return redirect(route('dashboard'));
    }
}
