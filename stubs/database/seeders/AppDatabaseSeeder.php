<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class AppDatabaseSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        Permission::firstOrCreate(['name' => 'view_dashboard', 'label' => 'View Dashboard', 'module' => 'App']);
        Permission::firstOrCreate(['name' => 'view_search', 'label' => 'View Search', 'module' => 'App']);

        Setting::firstOrCreate(['key' => 'app_name', 'value' => 'Laravel Starter']);
    }
}
