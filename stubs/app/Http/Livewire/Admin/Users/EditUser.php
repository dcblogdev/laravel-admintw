<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use function auth;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use function view;

class EditUser extends Component
{
    public User $user;

    public function mount()
    {
        parent::mount();

        if ($this->user->id !== auth()->id()) {
            abort_if_cannot('edit_users');
        }
    }

    public function render(): View
    {
        return view('livewire.admin.users.edit');
    }
}
