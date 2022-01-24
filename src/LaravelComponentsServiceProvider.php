<?php

namespace JordenPowleyWebDev\LaravelComponents;

use Illuminate\Support\ServiceProvider;
use JordenPowleyWebDev\LaravelComponents\View\Components\Button;
use JordenPowleyWebDev\LaravelComponents\View\Components\Card;
use JordenPowleyWebDev\LaravelComponents\View\Components\CardData;
use JordenPowleyWebDev\LaravelComponents\View\Components\CardHeader;
use JordenPowleyWebDev\LaravelComponents\View\Components\DropdownDivider;
use JordenPowleyWebDev\LaravelComponents\View\Components\DropdownItem;
use JordenPowleyWebDev\LaravelComponents\View\Components\DropdownMenu;
use JordenPowleyWebDev\LaravelComponents\View\Components\Forms\BasicInput as FormBasicInput;
use JordenPowleyWebDev\LaravelComponents\View\Components\Forms\Error as FormError;
use JordenPowleyWebDev\LaravelComponents\View\Components\Forms\File as FormFile;
use JordenPowleyWebDev\LaravelComponents\View\Components\Forms\Input as FormInput;
use JordenPowleyWebDev\LaravelComponents\View\Components\Forms\Label as FormLabel;
use JordenPowleyWebDev\LaravelComponents\View\Components\Forms\Select as FormSelect;
use JordenPowleyWebDev\LaravelComponents\View\Components\Forms\Textarea as FormTextarea;
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
            'test'              => Test::class,
            'button'            => Button::class,

            'card'              => Card::class,
            'card-data'         => CardData::class,
            'card-header'       => CardHeader::class,

            'dropdown-menu'     => DropdownMenu::class,
            'dropdown-item'     => DropdownItem::class,
            'dropdown-divider'  => DropdownDivider::class,

            'form-basic-input'  => FormBasicInput::class,
            'form-select'       => FormSelect::class,
            'form-file'         => FormFile::class,
            'form-textarea'     => FormTextarea::class,
            'form-label'        => FormLabel::class,
            'form-error'        => FormError::class,
            'form-input'        => FormInput::class,
        ]);

        // Load Layout Views
//        $this->loadViewComponentsAs(config('laravel-components.views-namespace').'-layout', [
//            Card::class,
//            CardData::class,
//            CardHeader::class,
//        ]);

        // Register the views for the package
        $viewsNamespace = config('laravel-components.views-namespace');
        $this->loadViewsFrom(__DIR__.'/../resources/views', $viewsNamespace);
    }
}