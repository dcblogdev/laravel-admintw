<?php

namespace App\Http\Livewire\Admin\Developers;

use App\Http\Livewire\Base;
use App\Models\User;
use Illuminate\Contracts\View\View;

use function view;

class Reference extends Base
{
    public $userId = '';

    public function render(): View
    {
        $users = User::get()->sortBy('name')->pluck('name', 'id');

        return view('livewire.admin.reference', compact('users'));
    }
}