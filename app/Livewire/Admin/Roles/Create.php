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
    public bool $showDialog = false;

    public string $label = '';

    /**
     * @return array<string, array<int, Unique|string>>
     */
    protected function rules(): array
    {
        return [
            'label' => [
                'required',
                'string',
                Rule::unique('roles'),
            ],
        ];
    }

    /**
     * @return array<string, string>
     */
    protected function messages(): array
    {
        return [
            'label.required' => 'The role is required.',
            'label.unique' => 'The role has already been taken.',
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

        /** @var Role $role */
        $role = Role::create([
            'label' => $this->label,
            'name' => strtolower(str_replace(' ', '_', $this->label)),
        ]);

        flash('Role created')->success();

        add_user_log([
            'title' => 'created role '.$this->label,
            'link' => route('admin.settings.roles.edit', ['role' => $role->id]),
            'reference_id' => $role->id,
            'section' => 'Roles',
            'type' => 'created',
        ]);

        $this->reset();

        $this->showDialog = false;

        $this->dispatch('added');
    }
}
