<?php

namespace JordenPowleyWebDev\LaravelComponents\View\Components\Forms;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use JordenPowleyWebDev\LaravelComponents\View\Components\Forms\Inputs\BasicInput;
use JordenPowleyWebDev\LaravelComponents\View\Components\Forms\Inputs\File;
use JordenPowleyWebDev\LaravelComponents\View\Components\Forms\Inputs\Select;
use JordenPowleyWebDev\LaravelComponents\View\Components\Forms\Inputs\Textarea;
use function config;
use function filled;
use function view;

/**
 * Class Input
 * @package JordenPowleyWebDev\LaravelComponents\View\Components
 */
class Input extends Component
{
    /**
     * @var string|null
     */
    public ?string $name = null;

    /**
     * @var string
     */
    public string $label = "";

    /**
     * @var string
     */
    public string $value = "";

    /**
     * @var bool
     */
    public bool $required = false;

    /**
     * @var string
     */
    public string $type = "text";

    /**
     * @var string|null
     */
    public ?string $description = null;

    /**
     * @var array
     */
    public array $inputAttributes = [];

    /**
     * @var array
     */
    public array $classes = [];

    /**
     * @var array|null
     */
    public ?array $labelComponent = null;

    /**
     * @var string
     */
    public string $inputComponentName = "";

    /**
     * @var array|null
     */
    public ?array $inputComponent = null;

    /**
     * @var array|null
     */
    public ?array $errorComponent = null;

    /**
     * Input::__construct()
     *
     * @param string $name
     * @param string $label
     * @param string $value
     * @param bool $required
     * @param string $type
     * @param string|null $description
     * @param array $classes
     * @param array $inputAttributes
     */
    public function __construct(string $name, string $label, string $value = "", bool $required = false, string $type = 'text', string $description = null, array $classes = [],  array $inputAttributes = [])
    {
        /**
         * Create Interface For All Form Input Components:
         * Process Classes
         * Process Attributes
         * Process Default Values
         */

        $this->name             = $name;
        $this->label            = $label;
        $this->value            = $value;
        $this->required         = $required;
        $this->type             = $type;
        $this->description      = $description;
        $this->inputAttributes  = $inputAttributes;

        // Construct the classes for the components
        $this->classes = [];
        foreach (['container', 'description', 'input-container', 'label-component', 'input-component', 'error-component'] as $item) {
            $itemClass = config('laravel-components.views-namespace')."-form-label-".$item;
            $this->classes[$item] = $itemClass." ".config('laravel-components.default-classes.components.form.form-input.'.$item);

            if (array_key_exists($item, $classes) && filled($classes[$item])) {
                $this->classes[$item] .= " ".$classes[$item];
            }
        }

        if ($this->required) {
            $this->classes['container'] = $this->classes['container'].' required';
        }

        if (filled($this->label)) {
            $this->labelComponent = [
                "name"      => $this->name,
                "label"     => $this->label,
                "required"  => $this->required,
                "type"      => $this->type,
                "classes"   => Label::processClasses($classes['label-component'] ?? [], $this->required),
            ];
        }

//        if (isset($type) && filled($type) && $type === "select") {
//            $this->inputComponentName   = config('laravel-components.views-namespace').'::components.forms.inputs.select';
//            $this->inputComponent       = [
//                'name'          => $this->name,
//                'value'         => $this->value,
//                'required'      => $this->required,
//                'options'       => array_key_exists('options', $inputAttributes) && filled($inputAttributes['options']) ? $inputAttributes['options'] : [],
//                'classes'       => Select::processClasses($classes['input-component'] ?? []),
//                'attributes'    => Select::processAttributes($inputAttributes['attributes'] ?? []),
//            ];
//        } else if (isset($type) && filled($type) && $type === "file") {
//            $this->inputComponentName   = config('laravel-components.views-namespace').'::components.forms.inputs.file';
//            $this->inputComponent       = [
//                'name'          => $this->name,
//                'button'        => array_key_exists('button', $inputAttributes) && filled($inputAttributes['button']) ? $inputAttributes['button'] : [],
//                'required'      => $this->required,
//                'classes'       => File::processClasses($classes['input-component'] ?? []),
//                'attributes'    => File::processAttributes($inputAttributes['attributes'] ?? []),
//            ];
//        } else if (isset($type) && filled($type) && $type === "textarea") {
//            $this->inputComponentName   = config('laravel-components.views-namespace').'::components.forms.inputs.textarea';
//            $this->inputComponent       = [
//                'name'          => $this->name,
//                'value'         => $this->value,
//                'required'      => $this->required,
//                'classes'       => Textarea::processClasses($classes['input-component'] ?? []),
//                'attributes'    => Textarea::processAttributes($inputAttributes['attributes'] ?? []),
//            ];
//        } else if (isset($type) && filled($type) && $type === "date") {
//            // TODO - Construct Date Attributes
//        } else if (isset($type) && filled($type) && $type === "searchable-select") {
//            // TODO - Construct Searchable Select Attributes
//        } else if (isset($type) && filled($type) && $type === "file-uploader") {
//            // TODO - Construct File Uploader Attributes
//        } else if (isset($type) && filled($type) && $type === "image-uploader") {
//            // TODO - Construct Image Uploader Attributes
//        } else {
//            $this->inputComponentName   = config('laravel-components.views-namespace').'::components.forms.inputs.basic-input';
//            $this->inputComponent       = [
//                'name'          => $this->name,
//                'value'         => $this->value,
//                'required'      => $this->required,
//                'type'          => $this->type ?? "text",
//                'classes'       => BasicInput::processClasses($classes['input-component'] ?? []),
//                'attributes'    => BasicInput::processAttributes($inputAttributes['attributes'] ?? []),
//            ];
//        }
//
//        $this->errorComponent = [
//            'classes' => Error::processClasses($classes['error-component'] ?? []),
//        ];
    }

    /**
     * Input::render()
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render(): View|Factory|Htmlable|string|Closure|Application
    {
        return view('laravel-components::components.forms.form-input');
    }
}