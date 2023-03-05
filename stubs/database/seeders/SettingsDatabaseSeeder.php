<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class SettingsDatabaseSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        Permission::firstOrCreate(['name' => 'view_audit_trails', 'label' => 'View Audit Trails', 'module' => 'Settings']);
        Permission::firstOrCreate(['name' => 'view_sent_emails', 'label' => 'View Sent Emails', 'module' => 'Settings']);
        Permission::firstOrCreate(['name' => 'view_system_settings', 'label' => 'View System Settings', 'module' => 'Settings']);
    }
}
