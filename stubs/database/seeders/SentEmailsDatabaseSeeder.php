<?php

namespace Database\Seeders;

use App\Models\Roles\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SentEmailsDatabaseSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        Permission::firstOrCreate(['name' => 'view_sent_emails', 'label' => 'View Sent Emails', 'module' => 'SentEmails']);
    }
}
