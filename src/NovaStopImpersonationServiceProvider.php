<?php

namespace RickyJohnston\NovaStopImpersonation;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use RickyJohnston\NovaStopImpersonation\View\Components\StopImpersonation;

class NovaStopImpersonationServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'rickyjohnston');

        Blade::component('stop-impersonation', StopImpersonation::class);

        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/rickyjohnston'),
        ], 'nova-stop-impersonation.views');
    }
}
