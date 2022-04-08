<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin\Roles;

use App\Http\Livewire\Base;
use App\Models\Roles\Permission;
use App\Models\Roles\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;

use function add_user_log;
use function flash;
use function redirect;
use function view;

class Edit extends Base
{
    public ?Role $role       = null;
    public       $label      = '';
    public       $permission = [];

    protected function rules(): array
    {
        return [
            'label' => 'required|string|unique:roles,label,'.$this->role->id
        ];
    }

    protected array $messages = [
        'label.required' => 'Role is required'
    ];

    /**
     * @throws ValidationException
     */
    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function mount(): void
    {
        $this->label = $this->role->label ?? '';

        if (isset($this->role->permissions)) {
            foreach ($this->role->permissions as $perm) {
                $this->permission[] = $perm->id;
            }
        }
    }

    public function render(): View
    {
        $modules = Permission::select('module')->distinct()->orderBy('module')->pluck('module');
        return view('livewire.admin.roles.edit', compact('modules'));
    }

    public function update(): Redirector|RedirectResponse
    {
        $this->validate();

        $this->role->label = $this->label;
        $this->role->name  = strtolower(str_replace(' ', '_', $this->label));

        //sync given permissions
        $permissions = $this->permission;

        if ($permissions !== null) {
            $this->role->syncPermissions($permissions);
        }

        $this->role->save();

        add_user_log([
            'title'        => 'updated role '.$this->label,
            'link'         => route('admin.settings.roles.edit', ['role' => $this->role->id]),
            'reference_id' => $this->role->id,
            'section'      => 'Roles',
            'type'         => 'Update'
        ]);

        flash('Role updated')->success();

        return redirect()->route('admin.settings.roles.index');
    }
}
