<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(UrlGenerator $url): void
    {
        if (app()->environment() !== 'local') {
            $url->forceScheme('https');
        }

        Password::defaults(function () {
            return Password::min(8)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->uncompromised();
        });

        Model::shouldBeStrict(! app()->isProduction());

        //if key exists
        if (Cache::has('setting_keys')) {
            //decode keys to array
            $keys = json_decode(Cache::get('setting_keys'), true);
            //loop over keys
            foreach ($keys as $key) {
                //override config setting
                config()->set([$key => Cache::get($key)]);
            }
        } else {
            if (Schema::hasTable('settings')) { //if cache key does not exist
                //get all rows
                $settings = Setting::all();

                $keys = [];

                //loop over rows
                foreach ($settings as $setting) {
                    $key = $setting->key;
                    $value = $setting->value;
                    $keys[] = $key;

                    //remember setting
                    Cache::forever($key, $value);

                    //override config setting
                    config()->set([$key => $value]);
                }

                if (count($keys) > 0) {
                    $keys = json_encode($keys);

                    //create cache key remember forever
                    Cache::forever('setting_keys', $keys);
                }
            }
        }
    }
}
