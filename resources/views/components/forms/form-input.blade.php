<div class="{{ $classes['container'] ?? "" }}">
    @if (isset($label) && filled($label))
        @include(config('laravel-components.views-namespace').'::components.forms.label', [
            'name'      => $name,
            'label'     => $label,
            'type'      => $type ?? 'text',
            'required'  => $required ?? false,
            'classes'   => $classes['label-component'] ?? [],
        ])
    @endif
    @if (isset($description) && filled($description))
        <div class="{{ $classes['description'] ?? "" }}">
            {{ $description }}
        </div>
    @endif
    <div class="{{ $classes['input-container'] }}">
        @if (isset($type) && filled($type) && $type === "select")
            @include(config('laravel-components.views-namespace').'::components.forms.inputs.select', [
                'name'          => $name,
                'value'         => $value = "",
                'required'      => $required ?? false,
                'options'       => array_key_exists('options', $inputAttributes) && filled($inputAttributes['options']) ? $inputAttributes['options'] : [],
                'classes'       => $classes['input-component'] ?? [],
                'attributes'    => array_key_exists('attributes', $inputAttributes) && filled($inputAttributes['attributes']) ? $inputAttributes['attributes'] : [],
            ])
        @elseif (isset($type) && filled($type) && $type === "file")
            @include(config('laravel-components.views-namespace').'::components.forms.inputs.file', [
                'name'          => $name,
                'button'        => array_key_exists('button', $inputAttributes) && filled($inputAttributes['button']) ? $inputAttributes['button'] : [],
                'required'      => $required ?? false,
                'classes'       => $classes['input-component'] ?? [],
                'attributes'    => array_key_exists('attributes', $inputAttributes) && filled($inputAttributes['attributes']) ? $inputAttributes['attributes'] : [],
            ])
        @elseif (isset($type) && filled($type) && $type === "textarea")
            @include(config('laravel-components.views-namespace').'::components.forms.inputs.textarea', [
                'name'          => $name,
                'value'         => $value = "",
                'required'      => $required ?? false,
                'classes'       => $classes['input-component'] ?? [],
                'attributes'    => array_key_exists('attributes', $inputAttributes) && filled($inputAttributes['attributes']) ? $inputAttributes['attributes'] : [],
            ])
        @elseif (isset($type) && filled($type) && $type === "date")
{{--             TODO - Include Date Input React Component --}}
        @elseif (isset($type) && filled($type) && $type === "searchable-select")
{{--             TODO - Include Searchable Select React Component --}}
        @elseif (isset($type) && filled($type) && $type === "file-uploader")
{{--             TODO - Include File Uploader React Component --}}
        @elseif (isset($type) && filled($type) && $type === "image-uploader")
{{--             TODO - Include Image Uploader React Component --}}
        @else
            @include(config('laravel-components.views-namespace').'::components.forms.inputs.basic-input', [
                'name'          => $name,
                'value'         => $value = "",
                'required'      => $required ?? false,
                'type'          => $type ?? "text",
                'classes'       => $classes['input-component'] ?? [],
                'attributes'    => array_key_exists('attributes', $inputAttributes) && filled($inputAttributes['attributes']) ? $inputAttributes['attributes'] : [],
            ])
        @endif
    </div>
    @error($name)
        @include(config('laravel-components.views-namespace').'::components.forms.error', [
            'error'     => $message,
            'classes'   => $classes['error-component'] ?? [],
        ])
    @enderror
</div>