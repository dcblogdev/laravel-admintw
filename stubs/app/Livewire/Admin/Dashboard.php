<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]
class Dashboard extends Component
{
    public function render()
    {
        abort_unless(auth()->user()->can('view_dashboard'), 403);

        return view('livewire.admin.dashboard');
    }
}
