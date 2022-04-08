<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AppDatabaseSeeder::class,
            AuditTrailsDatabaseSeeder::class,
            RolesDatabaseSeeder::class,
            SentEmailsDatabaseSeeder::class,
            UserDatabaseSeeder::class
        ]);
    }
}
