<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin\Roles;

use App\Http\Livewire\Base;
use App\Models\Roles\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;

use function add_user_log;
use function flash;
use function redirect;
use function view;

class Create extends Base
{
    public $role = '';

    protected array $rules = [
        'role' => 'required|string|unique:roles,label'
    ];

    protected array $messages = [
        'role.required' => 'Role is required'
    ];

    /**
     * @throws ValidationException
     */
    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function render(): View
    {
        return view('livewire.admin.roles.create');
    }

    public function store(): Redirector|RedirectResponse
    {
        $this->validate();

        $role = Role::create([
            'label' => $this->role,
            'name'  => strtolower(str_replace(' ', '_', $this->role))
        ]);

        flash('Role created')->success();

        add_user_log([
            'title'        => 'created role '.$this->role,
            'link'         => route('admin.settings.roles.edit', ['role' => $role->id]),
            'reference_id' => $role->id,
            'section'      => 'Roles',
            'type'         => 'created'
        ]);

        return redirect()->route('admin.settings.roles.index');
    }

    public function cancel(): void
    {
        $this->reset();
        $this->dispatchBrowserEvent('close-modal');
    }
}
