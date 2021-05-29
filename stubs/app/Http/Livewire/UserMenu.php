<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class UserMenu extends Component
{
    protected $listeners = ['refreshUserMenu' => '$refresh'];

    public function render(): View
    {
        return view('livewire.user-menu');
    }
}
