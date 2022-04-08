<?php

use App\Http\Livewire\Admin\Users\Edit\Roles;
use App\Models\Roles\Role;
use App\Models\Roles\RoleUser;
use App\Models\User;
use Livewire\Livewire;

test('cannot remove admin from user when no other users have admin role', function () {
    $role = Role::factory()->create(['name' => 'admin', 'label' => 'Admin']);
    $user = User::factory()->create();
    RoleUser::factory()->create(['role_id' => $role->id, 'user_id' => $user->id]);

    Livewire::actingAs($user)->test(Roles::class, ['user' => $user])
        ->set('roleSelections', [])
        ->call('update')
        ->assertCount('adminRoles', 1);
});

test('can remove admin from user when other users have admin role', function () {
    $role = Role::factory()->create(['name' => 'admin', 'label' => 'Admin']);

    $user1 = User::factory()->create();
    $user2 = User::factory()->create();
    $user3 = User::factory()->create();

    RoleUser::factory()->create(['role_id' => $role->id, 'user_id' => $user1->id]);
    RoleUser::factory()->create(['role_id' => $role->id, 'user_id' => $user2->id]);
    RoleUser::factory()->create(['role_id' => $role->id, 'user_id' => $user3->id]);

    Livewire::actingAs($user1)->test(Roles::class, ['user' => $user1])
        ->set('roleSelections', [])
        ->call('update')
        ->assertCount('adminRoles', 2);
});