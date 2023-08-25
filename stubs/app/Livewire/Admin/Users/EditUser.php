<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

use function auth;
use function view;

#[Title('Edit User')]
class EditUser extends Component
{
    public User $user;

    public function mount()
    {
        if ($this->user->id !== auth()->id()) {
            abort_if_cannot('edit_users');
        }
    }

    public function render(): View
    {
        return view('livewire.admin.users.edit');
    }
}
