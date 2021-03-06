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
 * Class Item
 * @package JordenPowleyWebDev\LaravelComponents\View\Components\Controls
 */
class Item extends Component
{
    /**
     * @var string
     */
    public string $href;

    /**
     * @var string
     */
    public string $label;

    /**
     * @var array|null
     */
    public ?array $classes;

    /**
     * @var array|null
     */
    public ?array $options;

    /**
     * Item::__construct()
     *
     * @param string $label
     * @param string $href
     * @param array $classes
     * @param array|null $options
     */
    public function __construct(string $label, string $href, array $classes = [], array $options = null)
    {
        $this->label    = $label;
        $this->href     = $href;
        $this->options  = $options;

        // Construct the classes for the components
        $this->classes = [];
        foreach (['container'] as $item) {
            $itemClass = config('laravel-components.views-namespace')."-controls-dropdown-item-".$item;
            $this->classes[$item] = $itemClass." ".config('laravel-components.default-classes.components.controls.dropdown.item.'.$item);

            if (array_key_exists($item, $classes) && filled($classes[$item])) {
                $this->classes[$item] .= " ".$classes[$item];
            }
        }
    }

    /**
     * Item::render()
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render(): View|Factory|Htmlable|string|Closure|Application
    {
        return view('laravel-components::components.controls.dropdown.item', [
            "target"    => $this->options['target'] ?? null,
        ]);
    }
}