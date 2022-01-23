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
 * Class FormLabel
 * @package JordenPowleyWebDev\LaravelComponents\View\Components
 */
class FormLabel extends Component
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
     * FormLabel::__construct()
     *
     * @param string $name
     * @param string $label
     * @param bool $required
     * @param string $type
     * @param array $classes
     */
    public function __construct(string $name, string $label, bool $required = false, string $type = 'text', array $classes = [])
    {
        $this->name     = $name;
        $this->label    = $label;
        $this->required = $required;
        $this->type     = $type;

        // Construct the classes for the components
        $this->classes = [];
        foreach (['container'] as $item) {
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
     * FormLabel::render()
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render(): View|Factory|Htmlable|string|Closure|Application
    {
        return view('laravel-components::components.forms.label');
    }
}