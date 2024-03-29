<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Users;

use App\Models\AuditTrail;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

use function abort_if_cannot;
use function view;

class Activity extends Component
{
    use WithPagination;

    public User $user;

    public int $paginate = 10;

    public string $title = '';

    public string $section = '';

    public string $type = '';

    public string $created_at = '';

    public string $sortField = 'created_at';

    public bool $sortAsc = false;

    public bool $openFilter = false;

    public function render(): View
    {
        abort_if_cannot('view_users_activity');

        $types = AuditTrail::groupby('type')->pluck('type');
        $sections = AuditTrail::groupby('section')->pluck('section');

        return view('livewire.admin.users.activity', compact('sections', 'types'))->layout('layouts.app');
    }

    public function builder(): mixed
    {
        return AuditTrail::where('user_id', $this->user->id)->orderBy($this->sortField,
            $this->sortAsc ? 'asc' : 'desc');
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

    public function userLogs(): mixed
    {
        $query = $this->builder();

        if ($this->title) {
            $query->where('title', 'like', '%'.$this->title.'%');
        }

        if ($this->section) {
            $query->where('section', '=', $this->section);
        }

        if ($this->type) {
            $query->where('type', '=', $this->type);
        }

        if ($this->created_at) {
            $this->openFilter = true;
            $parts = explode(' to ', $this->created_at);
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
        $this->title = '';
        $this->section = '';
        $this->type = '';
        $this->created_at = '';
    }
}
