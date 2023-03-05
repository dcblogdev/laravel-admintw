<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use function view;

class UserMenu extends Component
{
    protected $listeners = ['refreshUserMenu' => '$refresh'];

    public function render(): View
    {
        return view('livewire.admin.user-menu');
    }
}
