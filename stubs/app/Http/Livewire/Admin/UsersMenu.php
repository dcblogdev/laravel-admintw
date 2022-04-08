<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Base;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\WithPagination;

use function view;

class UsersMenu extends Base
{
    use WithPagination;

    public $users;
    public $query;

    public function render(): View
    {
        return view('livewire.admin.users-menu')->layout('layouts.app');
    }

    public function users()
    {
        $query = User::isActive()->orderby('last_activity', 'desc')->orderby('name');

        if ($this->query) {
            $query->where('name', 'like', '%'.$this->query.'%');
        }

        return $query->paginate();
    }
}
