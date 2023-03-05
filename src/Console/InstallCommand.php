<?php

namespace Dcblogdev\AdminTw\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admintw:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the admin theme';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        //copy folders
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/app', base_path('app'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/config', base_path('config'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/database', base_path('database'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources', base_path('resources'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/routes', base_path('routes'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/stubs', base_path('stubs'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/tests', base_path('tests'));

        copy(__DIR__.'/../../stubs/.env.example', base_path('.env.example'));
        copy(__DIR__.'/../../stubs/composer.json', base_path('composer.json'));
        copy(__DIR__.'/../../stubs/package.json', base_path('package.json'));
        copy(__DIR__.'/../../stubs/phpunit.xml', base_path('phpunit.xml'));
        copy(__DIR__.'/../../stubs/pint.json', base_path('pint.json'));
        copy(__DIR__.'/../../stubs/postcss.config.js', base_path('postcss.config.js'));
        copy(__DIR__.'/../../stubs/tailwind.config.js', base_path('tailwind.config.js'));
        copy(__DIR__.'/../../stubs/vite.config.js', base_path('vite.config.js'));

        (new Filesystem)->deleteDirectory('resources/css');

        $this->info('Admin theme installed successfully.');
        $this->info('Please run "composer update" then "npm install && npm run build" command to build your assets.');
    }
}
