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
 * Class FormTextarea
 * @package JordenPowleyWebDev\LaravelComponents\View\Components
 */
class FormTextarea extends Component
{
    /**
     * @var string|null
     */
    public ?string $name = null;

    /**
     * @var string
     */
    public string $value = "";

    /**
     * @var bool
     */
    public bool $required = false;

    /**
     * @var array
     */
    public array $classes = [];

    /**
     * @var array
     */
    public array $inputAttributes = [];

    /**
     * FormTextarea::__construct()
     *
     * @param string $name
     * @param string $value
     * @param bool $required
     * @param array $classes
     * @param array $attributes
     */
    public function __construct(string $name, string $value = "", bool $required = false, array $classes = [], array $attributes = [])
    {
        $this->name             = $name;
        $this->value            = $value;
        $this->required         = $required;
        $this->inputAttributes  = $attributes;

        // Construct the classes for the components
        $this->classes = [];
        foreach (['container'] as $item) {
            $itemClass = config('laravel-components.views-namespace')."-form-inputs-textarea-".$item;
            $this->classes[$item] = $itemClass." ".config('laravel-components.default-classes.components.form.inputs.textarea.'.$item);

            if (array_key_exists($item, $classes) && filled($classes[$item])) {
                $this->classes[$item] .= " ".$classes[$item];
            }
        }
    }

    /**
     * FormTextarea::render()
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render(): View|Factory|Htmlable|string|Closure|Application
    {
        return view('laravel-components::components.forms.inputs.textarea');
    }
}