<?php

namespace App\Http\Livewire\Admin\Settings;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use function view;

class Settings extends Component
{
    public function render(): View
    {
        abort_if_cannot('view_system_settings');

        return view('livewire.admin.settings.settings');
    }
}
