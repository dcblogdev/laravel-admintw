<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Users;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class UserMenu extends Component
{
    public function render(): View
    {
        return view('livewire.admin.users.user-menu');
    }
}
