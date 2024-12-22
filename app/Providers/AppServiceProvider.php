<?php

namespace App\Providers;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Notifications\VerifyEmail;
use App\Actions\Handlers\VerifyEmail as VerifyEmailHandler;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        Authenticate::redirectUsing(fn() => route('login.view'));
        VerifyEmail::toMailUsing(fn(...$arguments) => VerifyEmailHandler::handle(...$arguments));
    }
}
