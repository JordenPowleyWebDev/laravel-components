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
 * Class FormError
 * @package JordenPowleyWebDev\LaravelComponents\View\Components
 */
class FormError extends Component
{
    /**
     * @var string
     */
    public string $message;

    /**
     * @var array|null
     */
    public ?array $classes;

    /**
     * FormError::__construct()
     *
     * @param string $message
     * @param array $classes
     */
    public function __construct(string $message, array $classes = [])
    {
        $this->message = $message;

        // Construct the classes for the components
        $this->classes = [];
        foreach (['container'] as $item) {
            $itemClass = config('laravel-components.views-namespace')."-form-error-".$item;
            $this->classes[$item] = $itemClass." ".config('laravel-components.default-classes.components.form.error.'.$item);

            if (array_key_exists($item, $classes) && filled($classes[$item])) {
                $this->classes[$item] .= " ".$classes[$item];
            }
        }
    }

    /**
     * FormError::render()
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render(): View|Factory|Htmlable|string|Closure|Application
    {
        return view('laravel-components::components.form.error');
    }
}