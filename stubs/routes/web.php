<?php

use App\Http\Controllers\App\DashboardController;
use App\Http\Controllers\App\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->prefix('app')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('app');

    Route::get('edit-account', [UsersController::class, 'edit'])->name('app.users.edit');
});