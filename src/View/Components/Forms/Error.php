<?php

namespace JordenPowleyWebDev\LaravelComponents\View\Components\Forms;

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
 * Class Error
 * @package JordenPowleyWebDev\LaravelComponents\View\Components
 */
class Error extends Component
{
    /**
     * @var string
     */
    public string $error;

    /**
     * @var array|null
     */
    public ?array $classes;

    /**
     * Error::__construct()
     *
     * @param string $error
     * @param array $classes
     */
    public function __construct(string $error, array $classes = [])
    {
        $this->error = $error;

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
     * Error::render()
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render(): View|Factory|Htmlable|string|Closure|Application
    {
        return view('laravel-components::components.forms.error');
    }
}