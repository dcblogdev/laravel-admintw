<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class UsersController extends Controller
{
    public function edit(): View
    {
        return view('app.users.edit');
    }
}
