<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin\Users;

use App\Http\Livewire\Base;
use Illuminate\Contracts\View\View;

use function view;

class UserMenu extends Base
{
    protected $listeners = ['refreshUserMenu' => '$refresh'];

    public function render(): View
    {
        return view('livewire.admin.users.user-menu');
    }
}
