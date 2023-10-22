<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Users;

use App\Mail\Users\SendInviteMail;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Users')]
class Users extends Component
{
    use WithPagination;

    public string $paginate = '';

    public array $checked = [];

    public string $name = '';

    public string $email = '';

    public string $joined = '';

    public string $sortField = 'name';

    public bool $sortAsc = true;

    public bool $openFilter = false;

    public bool $sentEmail = false;

    protected array $queryString = [
        'paginate' => ['except' => ''],
        'name' => ['except' => ''],
        'email' => ['except' => ''],
        'joined' => ['except' => ''],
    ];

    protected $listeners = ['refreshUsers' => '$refresh'];

    public function render(): View
    {
        abort_if_cannot('view_users');

        return view('livewire.admin.users.index');
    }

    public function builder(): Builder
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

    public function users(): LengthAwarePaginator
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

        return $query->paginate((int) $this->paginate);
    }

    public function resetFilters(): void
    {
        $this->reset();
    }

    public function deleteUser(string $id): void
    {
        abort_if_cannot('delete_users');

        $this->builder()->findOrFail($id)->delete();

        $this->dispatch('close-modal');
    }

    public function resendInvite(string $id): void
    {
        $user = User::findOrFail($id);
        Mail::send(new SendInviteMail($user));

        $user->invited_at = now();
        $user->save();

        $this->sentEmail = true;
    }
}
