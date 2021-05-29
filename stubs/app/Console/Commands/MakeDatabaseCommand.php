<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeDatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:build';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Build and seed all table from fresh.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (app()->environment(['local', 'staging'])) {
            if ($this->confirm('Do you wish to continue?')) {
                $this->call('migrate:fresh');
                $this->line('------');
                $this->call('db:seed');
            }
        } else {
            $this->error('This command is disabled on production.');
        }
    }
}
