<?php

namespace Tests;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use WithFaker;

    public function authenticate(string $role = 'admin', string $permissionName = ''): self
    {
        $user = $this->prepareUser($role);

        if ($permissionName) {
            Gate::define($permissionName, static function () {
                return true;
            });
        }

        return $this->actingAs($user);
    }

    protected function prepareUser($role): User
    {
        $this->prepareRole($role);

        $user = User::factory()->create();
        $user->assignRole($role);

        return $user;
    }

    protected function prepareRole($role): Role
    {
        return Role::firstOrCreate(['name' => $role, 'label' => ucwords($role)]);
    }

    protected function preparePermission($permission): Role
    {
        Permission::firstOrCreate(['name' => $permission]);
    }
}
