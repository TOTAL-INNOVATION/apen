<?php

namespace App\Providers;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use App\Actions\Handlers\VerifyEmail as VerifyEmailHandler;
use App\Actions\Handlers\ResetPassword as ResetPasswordHandler;
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
        VerifyEmail::toMailUsing(fn(...$args) => VerifyEmailHandler::handle(...$args));
        ResetPassword::toMailUsing(fn($_, string $token) => ResetPasswordHandler::handle($token));
    }
}
