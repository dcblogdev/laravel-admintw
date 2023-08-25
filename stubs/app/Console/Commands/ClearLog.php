<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearLog extends Command
{
    protected $signature = 'log:clear';

    protected $description = 'empty error log';

    public function handle()
    {
        if (file_exists(storage_path('logs/laravel.log'))) {
            $f = fopen(storage_path('logs/laravel.log'), 'r+');
            if ($f !== false) {
                ftruncate($f, 0);
                fclose($f);
            }
        }

        $this->comment('Logged cleared');
    }
}
