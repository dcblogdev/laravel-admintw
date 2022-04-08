<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Base;
use Illuminate\Contracts\View\View;

use function view;

class HelpMenu extends Base
{
    public function render(): View
    {
        return view('livewire.admin.help-menu');
    }
}
