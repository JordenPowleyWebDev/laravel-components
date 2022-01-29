<?php

namespace JordenPowleyWebDev\LaravelComponents\View\Components\Layout;

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
 * Class CardData
 * @package JordenPowleyWebDev\LaravelComponents\View\Components
 */
class CardData extends Component
{
    /**
     * @var array
     */
    public array $data;

    /**
     * @var array|null
     */
    public ?array $classes;

    /**
     * CardData::__construct()
     *
     * @param array $data
     * @param array $classes
     */
    public function __construct(array $data, array $classes = [])
    {
        $this->data = $data;

        // Construct the classes for the components
        $this->classes = [];
        foreach (['container', 'column', 'label', 'value'] as $item) {
            $itemClass = config('laravel-components.views-namespace')."-layout-card-data-".$item;
            $this->classes[$item] = $itemClass." ".config('laravel-components.default-classes.components.layout.card-data.'.$item);

            if (array_key_exists($item, $classes) && filled($classes[$item])) {
                $this->classes[$item] .= " ".$classes[$item];
            }
        }
    }

    /**
     * CardData::render()
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render(): View|Factory|Htmlable|string|Closure|Application
    {
        return view('laravel-components::components.layout.card.data', [
            'data'  => $this->data,
        ]);
    }
}