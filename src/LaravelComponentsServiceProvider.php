<?php

namespace JordenPowleyWebDev\LaravelComponents;

use Illuminate\Support\ServiceProvider;
use JordenPowleyWebDev\LaravelComponents\View\Components\Button;
use JordenPowleyWebDev\LaravelComponents\View\Components\Test;

class LaravelComponentsServiceProvider extends ServiceProvider
{
    /**
     * LaravelComponentsServiceProvider::register()
     */
    public function register()
    {
        // Merge in the package config
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-components.php', 'laravel-components');
    }

    /**
     * LaravelComponentsServiceProvider::boot()
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            // Make config available to the app
            $this->publishes([
                __DIR__.'/../config/laravel-components.php' => config_path('laravel-components.php'),
            ], 'config');
        }

        // Load in View Components
        $this->loadViewComponentsAs(config('laravel-components.views-namespace'), [
            Test::class,
            Button::class,
        ]);

        // Register the views for the package
        $viewsNamespace = config('laravel-components.views-namespace');
        $this->loadViewsFrom(__DIR__.'/../resources/views', $viewsNamespace);
    }
}