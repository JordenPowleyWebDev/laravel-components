<?php

namespace JordenPowleyWebDev\LaravelComponents\View\Components;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Class Button
 * @package JordenPowleyWebDev\LaravelComponents\View\Components
 */
class Button extends Component
{
    const TYPES = [
        "SUBMIT"    => "submit",
        "HREF"      => "href",
        "ON_CLICK"  => "on_click",
        "MODAL"     => "modal",
    ];

    /**
     * @var string|null
     */
    public ?string $type;

    /**
     * @var string|null
     */
    public ?string $label;

    /**
     * @var array|null
     */
    public ?array $classes;

    /**
     * @var array|null
     */
    public ?array $options;

    /**
     * Button::__construct()
     *
     * @param string $type
     * @param string $label
     * @param array $classes
     * @param array|null $options
     */
    public function __construct(string $type, string $label, array $classes = [], array $options = null)
    {
        $this->type     = $type;
        $this->label    = $label;
        $this->options  = $options;

        // Construct the classes for the components
        $this->classes = [];
        foreach (['container', 'icon', 'label'] as $item) {
            $this->classes[$item] = config('laravel-components.default-classes.components.button.'.$item);

            if (array_key_exists($item, $classes) && filled($classes[$item])) {
                $this->classes[$item] .= " ".$classes[$item];
            }
        }
    }

    /**
     * Button::render()
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render(): View|Factory|Htmlable|string|Closure|Application
    {
        $icon = $this->options['icon'] ?? null;

        switch ($this->type) {
            case self::TYPES['HREF']:
                return view('laravel-components::components.buttons.href', [
                    "href"      => $this->options['href'] ?? "",
                    "target"    => $this->options['target'] ?? null,
                    "icon"      => $icon,
                ]);
            case self::TYPES['MODAL']:
                return view('laravel-components::components.buttons.modal', [
                    "modal" => $this->options['modal'] ?? "",
                    "icon"  => $icon,
                ]);
            case self::TYPES['ON_CLICK']:
                return view('laravel-components::components.buttons.onclick', [
                    "onClick"   => $this->options['on_click'] ?? "",
                    "icon"      => $icon,
                ]);
            case self::TYPES['SUBMIT']:
                return view('laravel-components::components.buttons.submit', [
                    "form"  => $this->options['form'] ?? null,
                    "icon"  => $icon,
                ]);
        }


    }
}