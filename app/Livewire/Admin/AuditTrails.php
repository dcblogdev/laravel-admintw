<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use App\Models\AuditTrail;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Audit Trails')]
class AuditTrails extends Component
{
    use WithPagination;

    public string $paginate = '';

    /**
     * @var array<string>
     */
    public array $checked = [];

    public ?string $user_id = null;

    public string $title = '';

    public string $section = '';

    public string $type = '';

    public string $created_at = '';

    public string $sortField = 'created_at';

    public bool $sortAsc = false;

    public bool $openFilter = false;

    public function render(): View
    {
        abort_if_cannot('view_audit_trails');

        $types = AuditTrail::groupby('type')->pluck('type');
        $sections = AuditTrail::groupby('section')->pluck('section');
        $users = User::isActive()->orderby('name')->get();

        return view('livewire.admin.audit-trails', compact('sections', 'types', 'users'));
    }

    /**
     * @return Builder<AuditTrail>
     */
    public function builder(): Builder
    {
        return AuditTrail::with('user')->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
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

    /**
     * @return LengthAwarePaginator<AuditTrail>
     */
    public function userLogs(): LengthAwarePaginator
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

        return $query->paginate((int) $this->paginate);
    }

    public function resetFilters(): void
    {
        $this->reset();
    }
}
