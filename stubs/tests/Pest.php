<?php

use App\Models\Roles\Permission;
use App\Models\Roles\Role;
use App\Models\Roles\RoleUser;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

uses(
    TestCase::class,
    RefreshDatabase::class,
    WithFaker::class
)->in(__DIR__);

function authenticate(string $role = 'admin', string $permissionName = ''): TestCase
{
   $user = prepareUser($role);

    if ($permissionName !== '') {
        $permission = Permission::factory()->create([
            'name' => $permissionName
        ]);

        Gate::define($permission->name, static function () {
            return true;
        });
    }

    return test()->actingAs($user);
}

function prepareUser($role) {
    $user = User::factory()->create();

    //generate image
    $imagePath = 'some/image/path.jpg';

    //save image
    $user->image = $imagePath;
    $user->save();

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



