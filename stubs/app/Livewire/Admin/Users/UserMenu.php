<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Users;

use Illuminate\Contracts\View\View;
use Livewire\Component;

use function view;

class UserMenu extends Component
{
    protected $listeners = ['refreshUserMenu' => '$refresh'];

    public function render(): View
    {
        return view('livewire.admin.users.user-menu');
    }
}
