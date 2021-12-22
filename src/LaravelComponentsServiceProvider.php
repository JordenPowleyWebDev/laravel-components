<?php

namespace JordenPowleyWebDev\LaravelComponents;

use Illuminate\Support\Facades\Blade;
use JordenPowleyWebDev\LaravelComponents\View\Components\Alert;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use JordenPowleyWebDev\LaravelComponents\Commands\LaravelComponentsCommand;

class LaravelComponentsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-components')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-components_table')
            ->hasCommand(LaravelComponentsCommand::class);

//        $this->loadViewComponentsAs('laravelcomponents', [
//            Alert::class,
//        ]);
    }

    public function boot()
    {
        Blade::componentNamespace('LaravelComponents\\Views\\Components', 'laravelcomponents');
    }
}
