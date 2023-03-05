<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin\Roles;

use App\Models\Role;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use function view;

class Roles extends Component
{
    use WithPagination;

    public $paginate = '';

    public $query = '';

    public $sortField = 'name';

    public $sortAsc = true;

    public function render(): View
    {
        abort_if_cannot('view_roles');

        return view('livewire.admin.roles.index');
    }

    public function builder()
    {
        return Role::orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
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

    public function roles(): object
    {
        $query = $this->builder();

        if ($this->query) {
            $query->where('name', 'like', '%'.$this->query.'%');
        }

        return $query->paginate($this->paginate);
    }

    public function deleteRole($id): void
    {
        $this->builder()->findOrFail($id)->delete();

        $this->dispatchBrowserEvent('close-modal');
    }
}
