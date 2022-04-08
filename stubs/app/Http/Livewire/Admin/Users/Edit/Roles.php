<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin\Users\Edit;

use App\Http\Livewire\Base;
use App\Models\Roles\Role;
use App\Models\Roles\RoleUser;
use App\Models\User;
use Illuminate\Contracts\View\View;

use function add_user_log;
use function flash;
use function is_admin;
use function view;

class Roles extends Base
{
    public User $user;
    public      $roleSelections = [];
    public      $adminRoles     = [];

    public function mount(): void
    {
        $this->roleSelections = $this->user->roles->pluck('id')->toArray();
    }

    public function render(): View
    {
        $roles = Role::orderby('name')->get();

        return view('livewire.admin.users.edit.roles', compact('roles'))->layout('layouts.app');
    }

    public function update(): bool
    {
        if (is_admin()) {
            $role = Role::where('name', 'admin')->firstOrFail();

            //if admin role is not in array
            if (!in_array(needle: $role->id, haystack: $this->roleSelections, strict: true)) {
                //assign role_id array
                $this->adminRoles = RoleUser::where('role_id', $role->id)->pluck('role_id')->toArray();

                //when there is only 1 admin role alert user and stop
                if (count($this->adminRoles) === 1 && $this->user->hasRole('admin')) {
                    flash('there must be at least one admin user!')->error();
                    return false;
                }

                $this->syncRoles($role);
                return false;
            }

            $this->syncRoles($role);
            return true;
        }

        return false;
    }

    protected function syncRoles($role): void
    {
        $this->user->roles()->sync($this->roleSelections);
        $this->adminRoles = RoleUser::where('role_id', $role->id)->pluck('role_id')->toArray();
        $this->user->save();

        add_user_log([
            'title'        => "updated ".$this->user->name."'s roles",
            'reference_id' => $this->user->id,
            'link'         => route('admin.users.edit', ['user' => $this->user->id]),
            'section'      => 'Users',
            'type'         => 'Update'
        ]);

        flash('Roles Updated!')->success();
    }
}
