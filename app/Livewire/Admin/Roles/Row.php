<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Roles;

use App\Models\Role;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Row extends Component
{
    public Role $role;

    public function render(): View
    {
        return view('livewire.admin.roles.row');
    }
}
