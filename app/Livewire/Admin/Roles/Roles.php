<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Roles;

use App\Models\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Roles')]
class Roles extends Component
{
    use WithPagination;

    public int $paginate = 25;

    public string $name = '';

    public string $sortField = 'name';

    public bool $sortAsc = true;

    /**
     * @var array<string>
     */
    protected $listeners = ['refreshRoles' => '$refresh'];

    public function render(): View
    {
        abort_if_cannot('view_roles');

        return view('livewire.admin.roles.index');
    }

    public function builder(): mixed
    {
        return Role::where('tenant_id', auth()->user()->tenant_id)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
    }

    public function sortBy(string $field): void
    {
        $this->sortAsc = true;

        if ($this->sortField === $field) {
            // @phpstan-ignore-next-line
            $this->sortAsc = ! $this->sortAsc;
        }

        $this->sortField = $field;
    }

    public function roles(): LengthAwarePaginator
    {
        $query = $this->builder();

        if ($this->name) {
            $query->where('name', 'like', '%'.$this->name.'%');
        }

        return $query->paginate($this->paginate);
    }

    public function deleteRole(string $id): void
    {
        $this->builder()->findOrFail($id)->delete();

        $this->dispatch('close-modal');
    }
}
