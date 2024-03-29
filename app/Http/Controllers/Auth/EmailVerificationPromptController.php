<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    public function __invoke(Request $request): Application|View|RedirectResponse
    {
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended(route('dashboard'))
                    : view('auth.verify-email');
    }
}
