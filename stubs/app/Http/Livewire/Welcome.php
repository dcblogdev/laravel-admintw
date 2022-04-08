<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Welcome extends Component
{
    public function render(): View
    {
        return view('livewire.welcome')->layout('layouts.guest');
    }
}
