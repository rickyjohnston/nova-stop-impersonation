<?php

namespace RickyJ\NovaStopImpersonation;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use RickyJ\NovaStopImpersonation\View\Components\StopImpersonation;

class NovaStopImpersonationServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'rickyj');

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
        $this->mergeConfigFrom(__DIR__.'/../config/nova-stop-impersonation.php', 'nova-stop-impersonation');
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        $this->publishes([
            __DIR__.'/../config/nova-stop-impersonation.php' => config_path('nova-stop-impersonation.php'),
        ], 'nova-stop-impersonation.config');

        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/rickyj'),
        ], 'nova-stop-impersonation.views');
    }
}
