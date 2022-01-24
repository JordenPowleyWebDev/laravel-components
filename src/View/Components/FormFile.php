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
 * Class FormFile
 * @package JordenPowleyWebDev\LaravelComponents\View\Components
 */
class FormFile extends Component
{
    /**
     * @var string|null
     */
    public ?string $name = null;

    /**
     * @var bool
     */
    public bool $required = false;

    /**
     * @var array|null
     */
    public ?array $button = null;

    /**
     * @var array
     */
    public array $classes = [];

    /**
     * @var array
     */
    public array $inputAttributes = [];

    /**
     * FormFile::__construct()
     *
     * @param string $name
     * @param bool $required
     * @param array|null $button
     * @param array $classes
     * @param array $attributes
     */
    public function __construct(string $name, bool $required = false, array $button = null, array $classes = [], array $attributes = [])
    {
        $this->name             = $name;
        $this->required         = $required;
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
     * FormFile::render()
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render(): View|Factory|Htmlable|string|Closure|Application
    {
        return view('laravel-components::components.forms.inputs.file');
    }
}