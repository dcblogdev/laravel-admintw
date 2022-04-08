<?php

namespace App\Providers;

use App\Listeners\EmailLogger;
use App\Models\Setting;
use Illuminate\Mail\Events\MessageSending;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Routing\UrlGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url): void
    {
        Schema::defaultStringLength(191);

        if (config('app.env') !== 'local') {
            $url->forceScheme('https');
        }

        Event::listen(
            MessageSending::class,
            EmailLogger::class
        );

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
            if (!Cache::has('setting_keys') && Schema::hasTable('settings')) { //if cache key does not exist
                //get all rows
                $settings = Setting::all();

                $keys = [];

                //loop over rows
                foreach ($settings as $setting) {
                    $key    = $setting->key;
                    $value  = $setting->value;
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
