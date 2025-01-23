<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Ligdicash\Ligdicash;

class LigdicashServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->singleton(Ligdicash::class, function($app) {
            return new Ligdicash([
                'api_key' => config('ligdicash.api_key'),
                'auth_token' => config('ligdicash.auth_token'),
                'platform' => config('ligdicash.plateform')
            ]);
        });
    }
}
