<?php

namespace App\Http\Livewire\Admin\Users;

use App\Http\Livewire\Base;
use App\Models\User;
use Illuminate\Contracts\View\View;

use function abort;
use function auth;
use function cannot;
use function view;

class EditUser extends Base
{
    public User $user;

    public function mount()
    {
        parent::mount();

        if ($this->user->id !== auth()->id() && cannot('edit_users')) {
            abort(403, "You cannot edit other people's accounts");
        }
    }

    public function render(): View
    {
        return view('livewire.admin.users.edit');
    }
}
