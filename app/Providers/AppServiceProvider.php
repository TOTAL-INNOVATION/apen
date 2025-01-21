<?php

namespace App\Providers;

use App\Actions\GetFlashInfos;
use App\Actions\Handlers\ResetPassword as ResetPasswordHandler;
use App\Actions\Handlers\VerifyEmail as VerifyEmailHandler;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Illuminate\Contracts\View\View as ViewContract;

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
        $this->configureHandlers();
        $this->configureDefaultValidations();
        $this->configureViewComposers();
        $this->configureDebugbar();
    }

    public function configureHandlers()
    {
        Authenticate::redirectUsing(fn() => route('login.view'));
        VerifyEmail::toMailUsing(fn(...$args) => VerifyEmailHandler::handle(...$args));
        ResetPassword::toMailUsing(fn($_, string $token) => ResetPasswordHandler::handle($token));
    }

    public function configureViewComposers(): void
    {
        View::composer(GetFlashInfos::TARGET_VIEW, function(ViewContract $view) {
            $infos = $this->app->make(GetFlashInfos::class)->handle();
            $view->with('infos', $infos);
        });
    }

    public function configureDefaultValidations(): void
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
    }

    public function configureDebugbar(): void
    {
        if (!app()->isProduction()) {
            Debugbar::enable();
        }
    }
}
