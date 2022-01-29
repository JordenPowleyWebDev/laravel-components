<?php

namespace JordenPowleyWebDev\LaravelComponents\View\Components\Controls\Dropdown;

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
 * Class DropdownDivider
 * @package JordenPowleyWebDev\LaravelComponents\View\Components
 */
class DropdownDivider extends Component
{
    /**
     * @var array|null
     */
    public ?array $classes;

    /**
     * DropdownDivider::__construct()
     *
     * @param array $classes
     */
    public function __construct(array $classes = [])
    {
        // Construct the classes for the components
        $this->classes = [];
        foreach (['container'] as $item) {
            $itemClass = config('laravel-components.views-namespace')."-controls-dropdown-divider-".$item;
            $this->classes[$item] = $itemClass." ".config('laravel-components.default-classes.components.controls.dropdown.divider.'.$item);

            if (array_key_exists($item, $classes) && filled($classes[$item])) {
                $this->classes[$item] .= " ".$classes[$item];
            }
        }
    }

    /**
     * DropdownDivider::render()
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render(): View|Factory|Htmlable|string|Closure|Application
    {
        return view('laravel-components::components.controls.dropdown.divider');
    }
}