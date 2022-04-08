<?php

namespace App\Http\Livewire\Admin\Users;

use App\Http\Livewire\Base;
use App\Models\User;
use Illuminate\Contracts\View\View;

use function abort;
use function cannot;
use function view;

class ShowUser extends Base
{
    public User $user;

    public function render(): View
    {
        if (cannot('view_users_profiles')) {
            abort(403, "You cannot view user profiles");
        }

        return view('livewire.admin.users.show');
    }
}
