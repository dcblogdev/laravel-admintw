<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Roles;

use App\Models\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;
use Livewire\Component;

class Create extends Component
{
    public string $role = '';

    /**
     * @return array<string, array<int, Unique|string>>
     */
    protected function rules(): array
    {
        return [
            'role' => [
                'required',
                'string',
                Rule::unique('roles'),
            ],
        ];
    }

    public function render(): View
    {
        abort_if_cannot('add_roles');

        return view('livewire.admin.roles.create');
    }

    public function store(): void
    {
        $this->validate();

        $role = Role::create([
            'label' => $this->role,
            'name' => strtolower(str_replace(' ', '_', $this->role)),
        ]);

        flash('Role created')->success();

        add_user_log([
            'title' => 'created role '.$this->role,
            'link' => route('admin.settings.roles.edit', ['role' => $role->id ?? 0]),
            'reference_id' => $role->id ?? 0,
            'section' => 'Roles',
            'type' => 'created',
        ]);

        $this->reset();

        $this->dispatch('refreshRoles');
        $this->dispatch('close-modal');
    }

    public function cancel(): void
    {
        $this->reset();
        $this->dispatch('close-modal');
    }
}
