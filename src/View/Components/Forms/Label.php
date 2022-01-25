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
 * Class Label
 * @package JordenPowleyWebDev\LaravelComponents\View\Components
 */
class Label extends Component implements FormInterface
{
    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public string $label;

    /**
     * @var bool
     */
    public bool $required;

    /**
     * @var string|null
     */
    public ?string $type;

    /**
     * @var array|null
     */
    public ?array $classes;

    /**
     * Label::__construct()
     *
     * @param string $name
     * @param string $label
     * @param bool $required
     * @param string $type
     * @param array $classes
     */
    public function __construct(string $name, string $label, bool $required = false, string $type = 'text', array $classes = [])
    {
        $this->name     = $name;
        $this->label    = $label;
        $this->required = $required;
        $this->type     = $type;
        $this->classes  = self::processClasses($classes, $this->required);
    }

    /**
     * Label::render()
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render(): View|Factory|Htmlable|string|Closure|Application
    {
        return view('laravel-components::components.forms.label');
    }

    /**
     * Label::processClasses()
     *
     * @param array $classes
     * @param bool $required
     * @return array
     */
    public static function processClasses(array $classes = [], bool $required = false): array
    {
        $processedClasses = [];
        foreach (['container'] as $item) {
            $itemClass = config('laravel-components.views-namespace')."-form-label-".$item;
            $processedClasses[$item] = $itemClass." ".config('laravel-components.default-classes.components.form.label.'.$item);

            if (array_key_exists($item, $classes) && filled($classes[$item])) {
                $processedClasses[$item] .= " ".$classes[$item];
            }
        }

        if ($required) {
            $processedClasses['container'] = $processedClasses['container'].' required';
        }

        return $processedClasses;
    }

    /**
     * Label::processAttributes()
     *
     * @param array $attributes
     * @return array|null
     */
    public static function processAttributes(array $attributes = []): ?array
    {
        return [];
    }
}
