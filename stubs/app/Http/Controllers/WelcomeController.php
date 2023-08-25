<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function __invoke(): view
    {
        return view('welcome');
    }
}
