<?php

namespace Database\Seeders;

use App\Models\Roles\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AuditTrailsDatabaseSeeder extends Seeder

{
    public function run()
    {
        Model::unguard();

        Permission::firstOrCreate(['name' => 'view_audit_trails', 'label' => 'View Audit Trails', 'module' => 'Audit Trails']);
    }
}
