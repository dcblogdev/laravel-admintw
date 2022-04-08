<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\JoinController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\TwoFaController;
use App\Http\Livewire\Admin\AuditTrails;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Developers\Reference;
use App\Http\Livewire\Admin\Roles\Edit;
use App\Http\Livewire\Admin\Roles\Roles;
use App\Http\Livewire\Admin\SentEmails\SentEmails;
use App\Http\Livewire\Admin\SentEmails\SentEmailsBody;
use App\Http\Livewire\Admin\Settings\Settings;
use App\Http\Livewire\Admin\Users\EditUser;
use App\Http\Livewire\Admin\Users\ShowUser;
use App\Http\Livewire\Admin\Users\Users;
use App\Http\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

Route::get('/', Welcome::class);

Route::middleware(['web', 'guest'])->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);

    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store']);

    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset/{token}', [ResetPasswordController::class, 'reset'])->name('password.reset.update');

    Route::get('join/{token}', [JoinController::class, 'index'])->name('join');
    Route::put('join/{id}', [JoinController::class, 'update'])->name('join.update');
});

Route::middleware(['web', 'auth', 'activeUser', 'IpCheckMiddleware'])->prefix('admin')->group(function () {
    //auth
    Route::get('two-fa', [TwoFaController::class, 'index'])->name('2fa');
    Route::post('two-fa', [TwoFaController::class, 'update'])->name('2fa.update');
    Route::get('twofa-setup', [TwoFaController::class, 'setup'])->name('2fasetup');
    Route::post('twofa-setup', [TwoFaController::class, 'setupUpdate'])->name('2fasetup.update');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/', Dashboard::class)->name('admin');

    Route::get('users', Users::class)->name('admin.users.index');
    Route::get('users/{user}/edit', EditUser::class)->name('admin.users.edit');
    Route::get('users/{user}', ShowUser::class)->name('admin.users.show');
});

Route::middleware(['web', 'auth', 'activeUser', 'IpCheckMiddleware'])->prefix('admin')->group(function () {
    Route::get('settings/audit-trails', AuditTrails::class)->name('admin.settings.audit-trails.index');
    Route::get('settings/sent-emails', SentEmails::class)->name('admin.settings.sent-emails');
    Route::get('settings/sent-emails-body/{id}', SentEmailsBody::class)->name('admin.settings.sent-emails.body');
});

Route::middleware(['web', 'auth', 'activeUser', 'IpCheckMiddleware', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('settings/system-settings', Settings::class)->name('admin.settings');
    Route::get('settings/roles', Roles::class)->name('admin.settings.roles.index');
    Route::get('settings/roles/{role}/edit', Edit::class)->name('admin.settings.roles.edit');
});

Route::middleware(['web', 'auth', 'activeUser', 'IpCheckMiddleware', 'role:developer'])->group(function () {
    Route::get('admin/developer/reference', Reference::class)->name('admin.developer.reference');
});