<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class RolesDatabaseSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        Permission::firstOrCreate(['name' => 'view_roles', 'label' => 'View Roles', 'module' => 'Roles']);
        Permission::firstOrCreate(['name' => 'add_roles', 'label' => 'Add Roles', 'module' => 'Roles']);
        Permission::firstOrCreate(['name' => 'edit_roles', 'label' => 'Edit Roles', 'module' => 'Roles']);
        Permission::firstOrCreate(['name' => 'delete_roles', 'label' => 'Delete Roles', 'module' => 'Roles']);
    }
}
