<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AuditTrail;
use App\Models\User;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        if ($response === Password::RESET_LINK_SENT) {
            $user = User::where('email', $request->input('email'))->first();
            $id   = $user?->id;

            AuditTrail::create([
                'user_id'      => $id,
                'reference_id' => $id,
                'title'        => "requested reset password email",
                'section'      => 'Auth',
                'type'         => 'Request Password Email'
            ]);
        }

        return $response === Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($response)
            : $this->sendResetLinkFailedResponse($response);
    }

    protected function validateEmail(Request $request): void
    {
        $this->validate($request, ['email' => 'required|email']);
    }

    protected function sendResetLinkResponse(string $response)
    {
        return back()->with('status', trans($response));
    }

    protected function sendResetLinkFailedResponse(string $response)
    {
        return back()->withErrors(
            ['email' => trans($response)]
        );
    }

    public function broker(): PasswordBroker
    {
        return Password::broker();
    }
}
