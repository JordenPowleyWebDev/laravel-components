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
 * Class CardHeader
 * @package JordenPowleyWebDev\LaravelComponents\View\Components
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
    public ?array $classes = null;

    /**
     * CardHeader::__construct()
     *
     * @param string|null $title
     * @param array $controls
     * @param array $classes
     */
    public function __construct(string $title = null, array $classes = [])
    {
        $this->title = filled($title) ? $title : $this->title;

        // Construct the classes for the components
        $this->classes = [];
        foreach (['container', 'title'] as $item) {
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