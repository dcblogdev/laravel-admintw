<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(Request $request, UrlGenerator $url): void
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

        Model::shouldBeStrict();

        view()->composer('layouts.app', function () {
            if (auth()->check()) {
                foreach (Setting::all() as $setting) {
                    //override config setting
                    config()->set([$setting->key => $setting->value]);
                }
            }
        });

        Http::globalOptions([
            'headers' => [
                'User-Agent' => config('app.user_agent'),
            ],
        ]);

        $this->bootAuth();
    }

    public function bootAuth(): void
    {
        Gate::before(function (User $user) {
            return $user->hasRole('admin') ? true : null;
        });
    }
}
