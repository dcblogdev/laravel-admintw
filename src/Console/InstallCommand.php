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
    public function handle()
    {
        // NPM Packages...
        $this->updateNodePackages(function ($packages) {
            return [
                "alpinejs" => "^2.7",
                "laravel-mix" => "^6.0.6",
                "resolve-url-loader" => "^3.1.0",
                "sass" => "^1.29.0",
                "sass-loader" => "^8.0.2",
                "tailwindcss" => "^2.0.2",
                "vue-template-compiler" => "^2.6.12"
            ] + $packages;
        }, 'devDependencies');

        $this->updateNodePackages(function ($packages) {
            return [
                "@tailwindcss/forms" => "^0.2",
                "@tailwindcss/typography" => "^0.3",
                "@fortawesome/fontawesome-free" => "^5.15.2",
                "flatpickr" => "^4.6.9",
                "filepond" => "^4.25.1",
                "prismjs" => "^1.23.0"
            ] + $packages;
        }, 'dependencies');

        //copy folders
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/app', base_path('app'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/config', base_path('config'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/database', base_path('database'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources', base_path('resources'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/routes', base_path('routes'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/stubs', base_path('stubs'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/tests', base_path('tests'));

        // Tailwind / Webpack...
        copy(__DIR__.'/../../stubs/phpunit.xml', base_path('phpunit.xml'));
        copy(__DIR__.'/../../stubs/tailwind.config.js', base_path('tailwind.config.js'));
        copy(__DIR__.'/../../stubs/webpack.mix.js', base_path('webpack.mix.js'));

        $this->info('Admin theme installed successfully.');
        $this->comment('Please execute the "npm install && npm run dev" command to build your assets.');
    }

    /**
     * Update the "package.json" file.
     *
     * @param  callable  $callback
     * @param  bool  $configurationKey
     * @return void
     */
    protected static function updateNodePackages(callable $callback, $configurationKey)
    {
        if (! file_exists(base_path('package.json'))) {
            return;
        }

        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        $packages[$configurationKey] = $callback(
            array_key_exists($configurationKey, $packages) ? $packages[$configurationKey] : [],
            $configurationKey
        );

        ksort($packages[$configurationKey]);

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT).PHP_EOL
        );
    }

    /**
     * Delete the "node_modules" directory and remove the associated lock files.
     *
     * @return void
     */
    protected static function flushNodeModules()
    {
        tap(new Filesystem, function ($files) {
            $files->deleteDirectory(base_path('node_modules'));
            $files->delete(base_path('yarn.lock'));
            $files->delete(base_path('package-lock.json'));
        });
    }

    /**
     * Replace a given string within a given file.
     *
     * @param  string  $search
     * @param  string  $replace
     * @param  string  $path
     * @return void
     */
    protected function replaceInFile($search, $replace, $path)
    {
        file_put_contents($path, str_replace($search, $replace, file_get_contents($path)));
    }
}
