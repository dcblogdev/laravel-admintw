<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function __invoke(): view
    {
        return view('welcome');
    }
}
