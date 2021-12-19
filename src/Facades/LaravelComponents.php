<?php

namespace JordenPowleyWebDev\LaravelComponents\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \JordenPowleyWebDev\LaravelComponents\LaravelComponents
 */
class LaravelComponents extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-components';
    }
}
