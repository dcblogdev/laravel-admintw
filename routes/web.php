<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Auth\TwoFaController;
use App\Http\Controllers\WelcomeController;
use App\Livewire\Admin\AuditTrails;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Roles\Edit;
use App\Livewire\Admin\Roles\Roles;
use App\Livewire\Admin\Settings\Settings;
use App\Livewire\Admin\Users\EditUser;
use App\Livewire\Admin\Users\ShowUser;
use App\Livewire\Admin\Users\Users;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

Livewire::setUpdateRoute(function ($handle) {
    return Route::post('livewire/update', $handle);
});

Route::get('/', WelcomeController::class);

Route::prefix(config('admintw.prefix'))->middleware(['auth', 'verified', 'activeUser', 'ipCheckMiddleware'])->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');

    Route::post('image-upload', UploadController::class)->name('image-upload');

    Route::view('developer-reference', 'developer-reference')
        ->name('developer-reference');

    Route::get('2fa', [TwoFaController::class, 'index'])->name('admin.2fa');
    Route::post('2fa', [TwoFaController::class, 'update'])->name('admin.2fa.update');
    Route::get('2fa-setup', [TwoFaController::class, 'setup'])->name('admin.2fa-setup');
    Route::post('2fa-setup', [TwoFaController::class, 'setupUpdate'])->name('admin.2fa-setup.update');

    Route::prefix('settings')->group(function () {
        Route::get('audit-trails', AuditTrails::class)->name('admin.settings.audit-trails.index');
        Route::get('system-settings', Settings::class)->name('admin.settings');
        Route::get('roles', Roles::class)->name('admin.settings.roles.index');
        Route::get('roles/{role}/edit', Edit::class)->name('admin.settings.roles.edit');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', Users::class)->name('admin.users.index');
        Route::get('{user}/edit', EditUser::class)->name('admin.users.edit');
        Route::get('{user}', ShowUser::class)->name('admin.users.show');
    });
});

require __DIR__.'/auth.php';
