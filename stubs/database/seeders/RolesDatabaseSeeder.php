<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Roles\Role;

class RolesDatabaseSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        Role::firstOrCreate(['name' => 'admin', 'label' => 'Admin']);
        Role::firstOrCreate(['name' => 'user', 'label' => 'User']);
    }
}
