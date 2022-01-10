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
     * CardHeader::__construct()
     *
     * @param string|null $title
     * @param array $controls
     */
    public function __construct(string $title = null, array $controls = [])
    {
        $this->title    = filled($title) ? $title : $this->title;
        $this->controls = (filled($controls) && (sizeof($controls) > 0)) ? $controls : $this->controls;
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