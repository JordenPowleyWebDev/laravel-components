<?php

namespace JordenPowleyWebDev\LaravelComponents\View\Components\Forms\Inputs;

/**
 * Interface::InputInterface
 */
interface InputInterface
{
    /**
     * InputInterface::processClasses()
     *
     * @param array $classes
     * @return array
     */
    public static function processClasses(array $classes = []) : array;

    /**
     * InputInterface::processAttributes()
     *
     * @param array $attributes
     * @return array|null
     */
    public static function processAttributes(array $attributes = []) : ?array;
}