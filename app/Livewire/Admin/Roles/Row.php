<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Roles;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Row extends Component
{
    public $role;

    public function render(): View
    {
        return view('livewire.admin.roles.row');
    }
}
