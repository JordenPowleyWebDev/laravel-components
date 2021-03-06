<?php

namespace JordenPowleyWebDev\LaravelComponents;

use Illuminate\Support\ServiceProvider;
use JordenPowleyWebDev\LaravelComponents\View\Components\Controls\Button;
use JordenPowleyWebDev\LaravelComponents\View\Components\Controls\Dropdown\Divider;
use JordenPowleyWebDev\LaravelComponents\View\Components\Controls\Dropdown\Item;
use JordenPowleyWebDev\LaravelComponents\View\Components\Controls\Dropdown\Modal as DropdownModal;
use JordenPowleyWebDev\LaravelComponents\View\Components\Controls\Dropdown\Menu;
use JordenPowleyWebDev\LaravelComponents\View\Components\Forms\Error as FormError;
use JordenPowleyWebDev\LaravelComponents\View\Components\Forms\Input as FormInput;
use JordenPowleyWebDev\LaravelComponents\View\Components\Forms\Inputs\BasicInput as FormBasicInput;
use JordenPowleyWebDev\LaravelComponents\View\Components\Forms\Inputs\File as FormFile;
use JordenPowleyWebDev\LaravelComponents\View\Components\Forms\Inputs\Select as FormSelect;
use JordenPowleyWebDev\LaravelComponents\View\Components\Forms\Inputs\Textarea as FormTextarea;
use JordenPowleyWebDev\LaravelComponents\View\Components\Forms\Label as FormLabel;
use JordenPowleyWebDev\LaravelComponents\View\Components\Layout\Card;
use JordenPowleyWebDev\LaravelComponents\View\Components\Layout\CardData;
use JordenPowleyWebDev\LaravelComponents\View\Components\Layout\CardHeader;
use JordenPowleyWebDev\LaravelComponents\View\Components\Layout\PaneCard;
use JordenPowleyWebDev\LaravelComponents\View\Components\Test;
use JordenPowleyWebDev\LaravelComponents\View\Components\Modals\Confirmation as ConfirmationModal;

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

            // Make Config Files Available To The App
            $this->publishes([
                __DIR__.'/../config/laravel-components.php' => config_path('laravel-components.php'),
            ], 'config');
            $this->publishes([
                __DIR__.'/../config/breadcrumbs.php' => config_path('breadcrumbs.php'),
            ], 'breadcrumbs');
            $this->publishes([
                __DIR__.'/../config/navigation.php' => config_path('navigation.php'),
            ], 'navigation');

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
            'test'                  => Test::class,
            'button'                => Button::class,

            'pane-card'             => PaneCard::class,

            'card'                  => Card::class,
            'card-data'             => CardData::class,
            'card-header'           => CardHeader::class,

            'dropdown-menu'         => Menu::class,
            'dropdown-item'         => Item::class,
            'dropdown-modal'        => DropdownModal::class,
            'dropdown-divider'      => Divider::class,

            'form-basic-input'      => FormBasicInput::class,
            'form-select'           => FormSelect::class,
            'form-file'             => FormFile::class,
            'form-textarea'         => FormTextarea::class,
            'form-label'            => FormLabel::class,
            'form-error'            => FormError::class,
            'form-input'            => FormInput::class,

            'confirmation-modal'    => ConfirmationModal::class,
        ]);

        // Register the views for the package
        $viewsNamespace = config('laravel-components.views-namespace');
        $this->loadViewsFrom(__DIR__.'/../resources/views', $viewsNamespace);
    }
}