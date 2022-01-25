<?php

namespace JordenPowleyWebDev\LaravelComponents\View\Components\Forms\Inputs;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use JordenPowleyWebDev\LaravelComponents\View\Components\Forms\FormInterface;
use function config;
use function filled;
use function view;

/**
 * Class Select
 */
class Select extends Component implements FormInterface
{
    /**
     * @var string|null
     */
    public ?string $name = null;

    /**
     * @var string
     */
    public string $value = "";

    /**
     * @var bool
     */
    public bool $required = false;

    /**
     * @var array
     */
    public array $options = [];

    /**
     * @var array
     */
    public array $classes = [];

    /**
     * @var array
     */
    public array $inputAttributes = [];

    /**
     * Select::__construct()
     *
     * @param string $name
     * @param string $value
     * @param bool $required
     * @param array $options
     * @param array $classes
     * @param array $attributes
     */
    public function __construct(string $name, string $value = "", bool $required = false, array $options = [], array $classes = [], array $attributes = [])
    {
        $this->name             = $name;
        $this->value            = $value;
        $this->required         = $required;
        $this->options          = $options;
        $this->classes          = self::processClasses($classes);
        $this->inputAttributes  = self::processAttributes($attributes);
    }

    /**
     * Select::render()
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render(): View|Factory|Htmlable|string|Closure|Application
    {
        return view('laravel-components::components.forms.inputs.select');
    }

    /**
     * Select::processClasses()
     *
     * @param array $classes
     * @return array
     */
    public static function processClasses(array $classes = []): array
    {
        $processedClasses = [];
        foreach (['container'] as $item) {
            $itemClass = config('laravel-components.views-namespace')."-form-inputs-select-".$item;
            $processedClasses[$item] = $itemClass." ".config('laravel-components.default-classes.components.form.inputs.select.'.$item);

            if (array_key_exists($item, $classes) && filled($classes[$item])) {
                $processedClasses[$item] .= " ".$classes[$item];
            }
        }

        return $processedClasses;
    }

    /**
     * Select::processAttributes()
     *
     * @param array $attributes
     * @return array|null
     */
    public static function processAttributes(array $attributes = []): ?array
    {
        return $attributes;
    }
}