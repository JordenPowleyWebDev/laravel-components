<div class="{{ $classes['container'] }}">
    @if (isset($label) && filled($label))
        <x-form-label
            :label="{{ $label }}"
            :name="{{ $name }}"
            :type="{{ $type }}"
            :required="{{ $required }}"
            :classes="{{ $classes['label-component'] }}"
        />
    @endif
    @if (isset($description) && filled($description))
        <div class="{{ $classes['description'] }}">
            {{ $description }}
        </div>
    @endif
    <div class="{{ $classes['input-container'] }}">
        @if (isset($type) && filled($type) && $type === "select")
            <x-input
                :name="{{ $name ?? "" }}"
                :value="{{ $value ?? "" }}"
                :options="{{ $options ?? [] }}"
                :required="{{ $required ?? false }}"
                :classes="{{ array_key_exists('input-component', $classes) && filled($classes['input-component']) ? $classes['input-component'] : [] }}"
                :attributes="{{ array_key_exists('input-attributes', $inputAttributes) && filled($inputAttributes['input-attributes']) ? $attributes['input-attributes'] : [] }}"
            />
        @elseif (isset($type) && filled($type) && $type === "file")
            <x-file
                :name="{{ $name ?? "" }}"
                :required="{{ $required ?? false }}"
                :classes="{{ array_key_exists('input-component', $classes) && filled($classes['input-component']) ? $classes['input-component'] : [] }}"
                :attributes="{{ array_key_exists('input-attributes', $inputAttributes) && filled($inputAttributes['input-attributes']) ? $attributes['input-attributes'] : [] }}"
            />
        @elseif (isset($type) && filled($type) && $type === "textarea")
            <x-textarea
                :name="{{ $name ?? "" }}"
                :value="{{ $value ?? "" }}"
                :required="{{ $required ?? false }}"
                :classes="{{ array_key_exists('input-component', $classes) && filled($classes['input-component']) ? $classes['input-component'] : [] }}"
                :attributes="{{ array_key_exists('input-attributes', $inputAttributes) && filled($inputAttributes['input-attributes']) ? $attributes['input-attributes'] : [] }}"
            />
        @elseif (isset($type) && filled($type) && $type === "date")
            {{-- TODO - Include Date Input React Component --}}
        @elseif (isset($type) && filled($type) && $type === "searchable-select")
            {{-- TODO - Include Searchable Select React Component --}}
        @elseif (isset($type) && filled($type) && $type === "file-uploader")
            {{-- TODO - Include File Uploader React Component --}}
        @elseif (isset($type) && filled($type) && $type === "image-uploader")
            {{-- TODO - Include Image Uploader React Component --}}
        @else
            <x-input
                :name="{{ $name ?? "" }}"
                :value="{{ $value ?? "" }}"
                :type="{{ $type ?? "text" }}"
                :required="{{ $required ?? false }}"
                :classes="{{ array_key_exists('input-component', $classes) && filled($classes['input-component']) ? $classes['input-component'] : [] }}"
                :attributes="{{ array_key_exists('input-attributes', $inputAttributes) && filled($inputAttributes['input-attributes']) ? $attributes['input-attributes'] : [] }}"
            />
        @endif
    </div>
    @error($name)
        <x-form-error
            :message="{{ $message }}"
            :classes="{{ $classes['error-component'] }}"
        />
    @enderror
</div>