<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Edit User')]
class EditUser extends Component
{
    public User $user;

    public function mount(): void
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
