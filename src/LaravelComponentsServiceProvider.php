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
            // Make Config File Available To The App
            $this->publishes([
                __DIR__.'/../config/laravel-components.php' => config_path('laravel-components.php'),
            ], 'config');

            // Make SCSS Files Available To The App
            $this->publishes([
                __DIR__.'/../resources/scss' => base_path('resources/vendor/laravel-components/scss'),
            ], 'scss');

            // Make JS Files Available To The App
            $this->publishes([
                __DIR__.'/../resources/js' => base_path('resources/vendor/laravel-components/js'),
            ], 'js');

            // Make Blade Files Available To The App
            $this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/vendor/laravel-components/views'),
            ], 'views');

            // Make Frontend Files Available To The App
            $this->publishes([
                __DIR__.'/../resources/scss' => base_path('resources/vendor/laravel-components/scss'),
                __DIR__.'/../resources/js' => base_path('resources/vendor/laravel-components/js'),
                __DIR__.'/../resources/views' => base_path('resources/vendor/laravel-components/views'),
            ], 'frontend');
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