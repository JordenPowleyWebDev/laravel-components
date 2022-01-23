<?php

namespace JordenPowleyWebDev\LaravelComponents\View\Components;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use function config;
use function filled;
use function view;

/**
 * Class File
 * @package JordenPowleyWebDev\LaravelComponents\View\Components
 */
class File extends Component
{
    /**
     * @var string
     */
    public string $name;

    /**
     * @var array|null
     */
    public ?array $button;

    /**
     * @var array
     */
    public array $classes;

    /**
     * @var array
     */
    public array $inputAttributes;

    /**
     * File::__construct()
     *
     * @param string $name
     * @param array|null $button
     * @param array $classes
     * @param array $attributes
     */
    public function __construct(string $name, array $button = null, array $classes = [], array $attributes = [])
    {
        $this->name             = $name;
        $this->button           = $button;
        $this->inputAttributes  = $attributes;

        // Construct the classes for the components
        $this->classes = [];
        foreach (['container', 'input', 'label-container', 'label-icon', 'label-text'] as $item) {
            $itemClass = config('laravel-components.views-namespace')."-form-inputs-file-".$item;
            $this->classes[$item] = $itemClass." ".config('laravel-components.default-classes.components.form.inputs.file.'.$item);

            if (array_key_exists($item, $classes) && filled($classes[$item])) {
                $this->classes[$item] .= " ".$classes[$item];
            }
        }
    }

    /**
     * File::render()
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render(): View|Factory|Htmlable|string|Closure|Application
    {
        return view('laravel-components::components.form.inputs.file');
    }
}