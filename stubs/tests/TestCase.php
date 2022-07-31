<?php

namespace Tests;

use App\Models\Roles\Permission;
use App\Models\Roles\Role;
use App\Models\Roles\RoleUser;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Gate;
use Illuminate\Testing\TestResponse;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;
    use WithFaker;

    public function get($uri, array $headers = []): TestResponse
    {
        return parent::get(value($uri), $headers);
    }

    public function authenticate(string $role = 'admin', string $permissionName = ''): TestCase
    {
        $user = $this->prepareUser($role);

        if ($permissionName !== '') {
            $permission = Permission::factory()->create([
                'name' => $permissionName
            ]);

            Gate::define($permission->name, static function () {
                return true;
            });
        }

        return $this->be($user);
    }

    protected function prepareUser($role): User
    {
        $user = User::factory()->create();

        $createdRole = Role::create([
            'name'  => $role,
            'label' => ucwords($role)
        ]);

        RoleUser::create([
            'role_id' => $createdRole->id,
            'user_id' => $user->id
        ]);

        return $user;
    }
}
