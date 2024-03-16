<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Settings;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Settings')]
class Settings extends Component
{
    public function render(): View
    {
        abort_if_cannot('view_system_settings');

        return view('livewire.admin.settings.settings');
    }
}
