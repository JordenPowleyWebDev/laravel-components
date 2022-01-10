<?php

namespace JordenPowleyWebDev\LaravelComponents\View\Components\Controls\Dropdown;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Class Menu
 * @package JordenPowleyWebDev\LaravelComponents\View\Components\Layout
 */
class Menu extends Component
{
    /**
     * @var array|null
     */
    public ?array $classes;

    /**
     * Menu::__construct()
     *
     * @param array $classes
     */
    public function __construct(array $classes = [])
    {
        // Construct the classes for the components
        $this->classes = [];
        foreach (['container', 'inner'] as $item) {
            $itemClass = config('laravel-components.views-namespace')."-card-".$item;
            $this->classes[$item] = $itemClass." ".config('laravel-components.default-classes.components.layout.card.'.$item);

            if (array_key_exists($item, $classes) && filled($classes[$item])) {
                $this->classes[$item] .= " ".$classes[$item];
            }
        }
    }

    /**
     * Menu::render()
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render(): View|Factory|Htmlable|string|Closure|Application
    {
        return view('laravel-components::components.layout.card.card');
    }
}