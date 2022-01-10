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
 * Class Card
 * @package JordenPowleyWebDev\LaravelComponents\View\Components
 */
class Card extends Component
{
    /**
     * @var array|null
     */
    public ?array $classes;

    /**
     * Card::__construct()
     *
     * @param array $classes
     */
    public function __construct(array $classes = [])
    {
        // Construct the classes for the components
        $this->classes = [];
        foreach (['container', 'inner'] as $item) {
            $itemClass = config('laravel-components.views-namespace')."-layout-card-".$item;
            $this->classes[$item] = $itemClass." ".config('laravel-components.default-classes.components.layout.card.'.$item);

            if (array_key_exists($item, $classes) && filled($classes[$item])) {
                $this->classes[$item] .= " ".$classes[$item];
            }
        }
    }

    /**
     * Card::render()
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render(): View|Factory|Htmlable|string|Closure|Application
    {
        return view('laravel-components::components.layout.card.card');
    }
}