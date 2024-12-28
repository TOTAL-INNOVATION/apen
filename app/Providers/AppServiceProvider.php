<?php

namespace App\Providers;

use App\Actions\Handlers\ResetPassword as ResetPasswordHandler;
use App\Actions\Handlers\VerifyEmail as VerifyEmailHandler;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
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
    public function boot(): void
    {

        Password::defaults(static function (): Password {
            return Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()
                ->rules(['required', 'confirmed']);
        });

        Authenticate::redirectUsing(fn() => route('login.view'));
        VerifyEmail::toMailUsing(fn(...$args) => VerifyEmailHandler::handle(...$args));
        ResetPassword::toMailUsing(fn($_, string $token) => ResetPasswordHandler::handle($token));
    }
}
