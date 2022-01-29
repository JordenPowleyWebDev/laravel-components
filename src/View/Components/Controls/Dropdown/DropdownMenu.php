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
 * Class DropdownMenu
 * @package JordenPowleyWebDev\LaravelComponents\View\Components
 */
class DropdownMenu extends Component
{
    /**
     * @var string
     */
    public string $label;

    /**
     * @var string
     */
    public string $id;

    /**
     * @var array|null
     */
    public ?array $classes;

    /**
     * DropdownMenu::__construct()
     *
     * @param string $label
     * @param string $id
     * @param array $classes
     */
    public function __construct(string $label, string $id, array $classes = [])
    {
        $this->label    = $label;
        $this->id       = $id;

        // Construct the classes for the components
        $this->classes = [];
        foreach (['container', 'inner', 'toggle', 'menu'] as $item) {
            $itemClass = config('laravel-components.views-namespace')."-controls-dropdown-menu-".$item;
            $this->classes[$item] = $itemClass." ".config('laravel-components.default-classes.components.controls.dropdown.menu.'.$item);

            if (array_key_exists($item, $classes) && filled($classes[$item])) {
                $this->classes[$item] .= " ".$classes[$item];
            }
        }
    }

    /**
     * DropdownMenu::render()
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render(): View|Factory|Htmlable|string|Closure|Application
    {
        return view('laravel-components::components.controls.dropdown.menu');
    }
}