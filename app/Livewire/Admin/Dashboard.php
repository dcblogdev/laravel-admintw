<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]
class Dashboard extends Component
{
    public function render(): View
    {
        abort_if_cannot('view_dashboard');

        return view('livewire.admin.dashboard');
    }
}
