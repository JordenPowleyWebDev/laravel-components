<?php

namespace JordenPowleyWebDev\LaravelComponents\View\Components\Forms;

/**
 * Interface::FormInterface
 */
interface FormInterface
{
    /**
     * FormInterface::processClasses()
     *
     * @param array $classes
     * @return array
     */
    public static function processClasses(array $classes = []) : array;

    /**
     * FormInterface::processAttributes()
     *
     * @param array $attributes
     * @return array|null
     */
    public static function processAttributes(array $attributes = []) : ?array;
}