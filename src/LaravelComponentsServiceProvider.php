<?php

namespace JordenPowleyWebDev\LaravelComponents;

use Illuminate\Support\Facades\Blade;
use JordenPowleyWebDev\LaravelComponents\View\Components\Test;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use JordenPowleyWebDev\LaravelComponents\Commands\LaravelComponentsCommand;

class LaravelComponentsServiceProvider extends PackageServiceProvider
{
    /** @var string */
    private const PATH_VIEWS = __DIR__.'/../resources/views';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('components')
            ->hasConfigFile()
            ->hasViews('components');
//            ->hasMigration('create_laravel_components_table')
//            ->hasCommand(LaravelComponentsCommand::class);
    }

    public function boot()
    {
        $this->loadViewsFrom(self::PATH_VIEWS, 'components');

//        $this->loadViewComponentsAs('laravel-components', [
//            Test::class,
//        ]);

        Blade::componentNamespace('JordenPowleyWebDev\\LaravelComponents\\View\\Components', 'components');

//        Blade::componentNamespace('JordenPowleyWebDev\\LaravelComponents\\View\\Components', 'components');
    }
}
