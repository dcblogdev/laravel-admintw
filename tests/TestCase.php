<?php

namespace Tests;

use AllowDynamicProperties;
use App\Models\Role;
use App\Models\Tenant;
use App\Models\TenantUser;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;

#[AllowDynamicProperties]
abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function noneTenantOwner()
    {
        $this->authenticate();

        $user = User::factory()->create();
        $tenant = Tenant::create([
            'owner_id' => $user->id,
        ]);

        $secondUser = User::create([
            'tenant_id' => $tenant->id,
            'name' => 'Test User',
            'slug' => 'test-user',
            'email' => 'user@domain.com',
            'email_verified_at' => now(),
            'is_active' => 1,
        ]);

        return $this->actingAs($secondUser);
    }

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
        $user = User::factory()->create();

        $tenant = Tenant::create([
            'owner_id' => $user->id,
        ]);

        setPermissionsTeamId($tenant->id);

        $this->prepareRole($role, $tenant);

        TenantUser::create([
            'tenant_id' => $tenant->id,
            'user_id' => $user->id,
        ]);

        $user->tenant_id = $tenant->id;
        $user->assignRole($role);
        $user->save();

        return $user;
    }

    protected function prepareRole($role, $tenant): Role
    {
        return Role::firstOrCreate([
            'tenant_id' => $tenant->id,
            'name' => $role,
            'label' => ucwords($role),
        ]);
    }

    protected function preparePermission($permission): Role
    {
        Permission::firstOrCreate(['name' => $permission]);
    }
}
