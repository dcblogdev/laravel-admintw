<?php

namespace Database\Seeders;

use App\Models\Roles\Permission;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AppDatabaseSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        Permission::firstOrCreate(['name' => 'view_dashboard', 'label' => 'View Dashboard', 'module' => 'App']);
        Permission::firstOrCreate(['name' => 'view_search', 'label' => 'View Search', 'module' => 'App']);

        Setting::firstOrCreate(['key' => 'app.name'], ['value' => 'AdminTW']);
        Setting::firstOrCreate(['key' => 'applicationLogo'], ['value' => 'logo/A9dQcvFuzYLCVUfzrwqnSxN6RLKuCNDhjHwEVN3t.png']);
        Setting::firstOrCreate(['key' => 'applicationLogoDark'], ['value' => 'logo/A9dQcvFuzYLCVUfzrwqnSxN6RLKuCNDhjHwEVN3t.png']);
        Setting::firstOrCreate(['key' => 'loginLogo'], ['value' => 'logo/xbC28LrLRPgFQs3D4QEdTHnaJbGbT1QuCxnoxAAu.png']);
        Setting::firstOrCreate(['key' => 'loginLogoDark'], ['value' => 'logo/xbC28LrLRPgFQs3D4QEdTHnaJbGbT1QuCxnoxAAu.png']);
        Setting::firstOrCreate(['key' => 'ips'], ['value' => '[{"ip":"127.0.0.1","comment":"local"}]']);
        Setting::firstOrCreate(['key' => 'forced_2fa'], ['value' => '']);
    }
}