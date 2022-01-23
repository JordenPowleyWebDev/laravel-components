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
    public string $name;

    /**
     * @var string
     */
    public string $label;

    /**
     * @var string
     */
    public string $value;

    /**
     * @var bool
     */
    public bool $required;

    /**
     * @var string
     */
    public ?string $type;

    /**
     * @var string|null
     */
    public ?string $description;

    /**
     * @var array
     */
    public array $inputAttributes;

    /**
     * @var array|null
     */
    public ?array $classes;

    /**
     * FormInput::__construct()
     *
     * @param string $name
     * @param string $label
     * @param string $value
     * @param bool $required
     * @param string $type
     * @param string|null $description
     * @param array $inputAttributes
     * @param array $classes
     */
    public function __construct(string $name, string $label, string $value = "", bool $required = false, string $type = 'text', string $description = null, array $inputAttributes = [], array $classes = [])
    {
        $this->name             = $name;
        $this->label            = $label;
        $this->value            = $value;
        $this->required         = $required;
        $this->type             = $type;
        $this->description      = $description;
        $this->inputAttributes  = $inputAttributes;

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