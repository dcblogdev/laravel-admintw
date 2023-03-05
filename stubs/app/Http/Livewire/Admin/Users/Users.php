<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin\Users;

use App\Mail\Users\SendInviteMail;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $paginate = '';

    public $checked = [];

    public $name = '';

    public $email = '';

    public $joined = '';

    public $sortField = 'name';

    public $sortAsc = true;

    public $openFilter = false;

    public $sentEmail = false;

    protected $listeners = ['refreshUsers' => '$refresh'];

    public function render(): View
    {
        abort_if_cannot('view_users');

        return view('livewire.admin.users.index');
    }

    public function builder()
    {
        return User::with('roles')->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
    }

    public function sortBy(string $field): void
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function users()
    {
        $query = $this->builder();

        if ($this->name) {
            $query->where('name', 'like', '%'.$this->name.'%');
        }

        if ($this->email) {
            $this->openFilter = true;
            $query->where('email', 'like', '%'.$this->email.'%');
        }

        if ($this->joined) {
            $this->openFilter = true;
            $parts = explode(' to ', $this->joined);
            if (isset($parts[1])) {
                $from = Carbon::parse($parts[0])->format('Y-m-d');
                $to = Carbon::parse($parts[1])->format('Y-m-d');
                $query->whereBetween('created_at', [$from, $to]);
            }
        }

        return $query->paginate($this->paginate);
    }

    public function resetFilters(): void
    {
        $this->reset();
    }

    public function deleteUser($id): void
    {
        abort_if_cannot('delete_users');

        $this->builder()->findOrFail($id)->delete();

        $this->dispatchBrowserEvent('close-modal');
    }

    public function resendInvite($id): void
    {
        $user = $this->builder()->findOrFail($id);
        Mail::send(new SendInviteMail($user));

        $user->invited_at = now();
        $user->save();

        $this->sentEmail = true;
    }
}
