<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Roles;

use App\Models\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\WithPagination;

class Create extends Component
{
    use withPagination;

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
                Rule::unique('roles', 'label')->where(function (object $query) {
                    //@phpstan-ignore-next-line
                    return $query->where('tenant_id', auth()->user()->tenant_id);
                }),
            ],
        ];
    }

    /**
     * @var array<string, string>
     */
    protected array $messages = [
        'role.required' => 'Role is required',
    ];

    /**
     * @throws ValidationException
     */
    public function updated(string $propertyName): void
    {
        $this->validateOnly($propertyName);
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
            //@phpstan-ignore-next-line
            'link' => route('admin.settings.roles.edit', ['role' => $role->id]),
            //@phpstan-ignore-next-line
            'reference_id' => $role->id,
            'section' => 'Roles',
            'type' => 'created',
        ]);

        $this->dispatch('refreshRoles');
        $this->dispatch('close-modal');
    }

    public function cancel(): void
    {
        $this->reset();
        $this->dispatch('close-modal');
    }
}
