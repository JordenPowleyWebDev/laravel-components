<?php

namespace JordenPowleyWebDev\LaravelComponents\View\Components\Layout;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Class CardHeader
 * @package JordenPowleyWebDev\LaravelComponents\View\Components\Layout
 */
class CardHeader extends Component
{
    /**
     * @var string|null
     */
    public ?string $title = null;

    /**
     * @var array|null
     */
    public ?array $controls = null;

    /**
     * @var array|null
     */
    public ?array $classes = null;

    /**
     * CardHeader::__construct()
     *
     * @param string|null $title
     * @param array $controls
     * @param array $classes
     */
    public function __construct(string $title = null, array $controls = [], array $classes = [])
    {
        $this->title    = filled($title) ? $title : $this->title;
        $this->controls = (filled($controls) && (sizeof($controls) > 0)) ? $controls : $this->controls;

        // Construct the classes for the components
        $this->classes = [];
        foreach (['container', 'column', 'label', 'value'] as $item) {
            $itemClass = config('laravel-components.views-namespace')."-layout-card-header-".$item;
            $this->classes[$item] = $itemClass." ".config('laravel-components.default-classes.components.layout.card-header.'.$item);

            if (array_key_exists($item, $classes) && filled($classes[$item])) {
                $this->classes[$item] .= " ".$classes[$item];
            }
        }
    }

    /**
     * CardHeader::render()
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render(): View|Factory|Htmlable|string|Closure|Application
    {
        return view('laravel-components::components.layout.card.header');
    }
}