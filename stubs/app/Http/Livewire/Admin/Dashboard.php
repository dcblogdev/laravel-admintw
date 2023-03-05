<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        abort_unless(auth()->user()->can('view_dashboard'), 403);

        return view('livewire.admin.dashboard');
    }
}
