<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use App\Models\AuditTrail;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

use function abort_if_cannot;
use function view;

#[Title('Audit Trails')]
class AuditTrails extends Component
{
    use WithPagination;

    public $paginate = '';

    public $checked = [];

    public $user_id = 0;

    public $title = '';

    public $section = '';

    public $type = '';

    public $created_at = '';

    public $sortField = 'created_at';

    public $sortAsc = false;

    public $openFilter = false;

    public function render(): View
    {
        abort_if_cannot('view_audit_trails');

        $types = AuditTrail::groupby('type')->pluck('type');
        $sections = AuditTrail::groupby('section')->pluck('section');
        $users = User::isActive()->orderby('name')->get();

        return view('livewire.admin.audit-trails', compact('sections', 'types', 'users'));
    }

    public function builder()
    {
        return AuditTrail::with('user')->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
    }

    public function sortBy($field): void
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function userLogs()
    {
        $query = $this->builder();

        if ($this->title) {
            $query->where('title', 'like', '%'.$this->title.'%');
        }

        if ($this->user_id) {
            $query->where('user_id', '=', $this->user_id);
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
        $this->reset();
    }
}
