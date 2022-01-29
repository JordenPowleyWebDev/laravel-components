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
 * Class Modal
 */
class Modal extends Component
{
    /**
     * @var string
     */
    public string $modal = "";

    /**
     * @var string
     */
    public string $label = "";

    /**
     * @var array|null
     */
    public ?array $classes;

    /**
     * Modal::__construct()
     *
     * @param string $label
     * @param string $modal
     * @param array $classes
     */
    public function __construct(string $label, string $modal, array $classes = [])
    {
        $this->label    = $label;
        $this->modal    = $modal;

        // Construct the classes for the components
        $this->classes = [];
        foreach (['container', 'label'] as $item) {
            $itemClass = config('laravel-components.views-namespace')."-controls-dropdown-modal-".$item;
            $this->classes[$item] = $itemClass." ".config('laravel-components.default-classes.components.controls.dropdown.modal.'.$item);

            if (array_key_exists($item, $classes) && filled($classes[$item])) {
                $this->classes[$item] .= " ".$classes[$item];
            }
        }
    }

    /**
     * Modal::render()
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render(): View|Factory|Htmlable|string|Closure|Application
    {
        return view('laravel-components::components.controls.dropdown.modal');
    }
}