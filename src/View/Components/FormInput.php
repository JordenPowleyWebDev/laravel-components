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
 * Class FormInput
 * @package JordenPowleyWebDev\LaravelComponents\View\Components
 */
class FormInput extends Component
{
    /**
     * @var string
     */
    public string $label;

    /**
     * @var bool
     */
    public bool $required;

    /**
     * @var string|null
     */
    public ?string $type;
    /**
     * @var array|null
     */
    public ?array $classes;

    /**
     * @var array
     */
    public array $inputAttributes;

    /**
     * FormInput::__construct()
     *
     * @param string $label
     * @param bool $required
     * @param string|null $type
     * @param array $classes
     */
    public function __construct(string $label, bool $required = false, string $type = null, array $classes = [],  array $attributes = [])
    {
        $this->label            = $label;
        $this->required         = $required;
        $this->type             = $type;
        $this->inputAttributes  = $attributes;

        // Construct the classes for the components
        $this->classes = [];
        foreach (['container', 'description', 'input-container'] as $item) {
            $itemClass = config('laravel-components.views-namespace')."-form-label-".$item;
            $this->classes[$item] = $itemClass." ".config('laravel-components.default-classes.components.form.label.'.$item);

            if (array_key_exists($item, $classes) && filled($classes[$item])) {
                $this->classes[$item] .= " ".$classes[$item];
            }
        }

        if ($this->required) {
            $this->classes['container'] = $this->classes['container'].' required';
        }
    }

    /**
     * FormInput::render()
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render(): View|Factory|Htmlable|string|Closure|Application
    {
        return view('laravel-components::components.form.form-input');
    }
}