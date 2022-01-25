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
 * Class File
 */
class File extends Component implements FormInterface
{
    /**
     * @var string|null
     */
    public ?string $name = null;

    /**
     * @var bool
     */
    public bool $required = false;

    /**
     * @var array|null
     */
    public ?array $button = null;

    /**
     * @var array
     */
    public array $classes = [];

    /**
     * @var array
     */
    public array $inputAttributes = [];

    /**
     * File::__construct()
     *
     * @param string $name
     * @param bool $required
     * @param array|null $button
     * @param array $classes
     * @param array $attributes
     */
    public function __construct(string $name, bool $required = false, array $button = null, array $classes = [], array $attributes = [])
    {
        $this->name             = $name;
        $this->required         = $required;
        $this->button           = $button;
        $this->classes          = self::processClasses($classes);
        $this->inputAttributes  = self::processAttributes($attributes);
    }

    /**
     * File::render()
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render(): View|Factory|Htmlable|string|Closure|Application
    {
        return view('laravel-components::components.forms.inputs.file');
    }

    /**
     * File::processClasses()
     *
     * @param array $classes
     * @return array
     */
    public static function processClasses(array $classes = []): array
    {
        $processedClasses = [];
        foreach (['container', 'input', 'label-container', 'label-icon', 'label-text'] as $item) {
            $itemClass = config('laravel-components.views-namespace')."-form-inputs-file-".$item;
            $processedClasses[$item] = $itemClass." ".config('laravel-components.default-classes.components.form.inputs.file.'.$item);

            if (array_key_exists($item, $classes) && filled($classes[$item])) {
                $processedClasses[$item] .= " ".$classes[$item];
            }
        }

        return $processedClasses;
    }

    /**
     * File::processAttributes()
     *
     * @param array $attributes
     * @return array|null
     */
    public static function processAttributes(array $attributes = []): ?array
    {
        return $attributes;
    }
}