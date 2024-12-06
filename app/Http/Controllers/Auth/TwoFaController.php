<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\TwoFa\TwoFaUpdateRequest;
use App\Models\AuditTrail;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Session;
use RobThree\Auth\TwoFactorAuth;

class TwoFaController extends Controller
{
    public function index(): View|RedirectResponse
    {
        if (session('2fa-login') !== true) {
            return redirect(route('dashboard'));
        }

        return view('auth.twofa');
    }

    public function update(TwoFaUpdateRequest $request, TwoFactorAuth $twoFactorAuth): Redirector|RedirectResponse
    {
        $validated = $request->validated();

        $valid = $twoFactorAuth->verifyCode($request->user()->two_fa_secret_key ?? '', $validated['code']);

        if ($valid === false) {
            return back()->withErrors('Code is invalid please try again.');
        }

        session()->forget('2fa-login');

        return redirect(route('dashboard'));
    }

    public function setup(TwoFactorAuth $twoFactorAuth): View
    {
        $secretKey = $twoFactorAuth->createSecret();
        $inlineUrl = $twoFactorAuth->getQRCodeImageAsDataUri(config('app.name'), $secretKey);

        return view('auth.twofasetup', compact('secretKey', 'inlineUrl'));
    }

    public function setupUpdate(Request $request, TwoFactorAuth $twoFactorAuth): RedirectResponse
    {
        $request->validate([
            'code' => [
                'required', 'min:6', function (string $attribute, string $value, callable $fail) use ($request, $twoFactorAuth) {
                    $valid = $twoFactorAuth->verifyCode($request->input('secretKey'), $request->input('code'));

                    if ($valid === false) {
                        AuditTrail::create([
                            'user_id' => auth()->id(),
                            'reference_id' => auth()->id(),
                            'title' => 'failed 2FA setup, code invalid',
                            'section' => 'Auth',
                            'type' => '2FA Setup',
                        ]);

                        $fail('Code is invalid please scan the barcode again and enter the code.');
                    }
                },
            ],
        ]);

        $user = User::findOrFail(auth()->id());
        $user->two_fa_active = true;
        $user->two_fa_secret_key = $request->input('secretKey');
        $user->save();

        AuditTrail::create([
            'user_id' => auth()->id(),
            'reference_id' => auth()->id(),
            'title' => 'setup 2FA complete',
            'section' => 'Auth',
            'type' => '2FA Setup',
        ]);

        Session::forget('2fa-setup');

        return redirect(route('dashboard'));
    }
}
