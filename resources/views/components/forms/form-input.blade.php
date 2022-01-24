<div class="{{ $classes['container'] }}">
    @if (isset($label) && filled($label))
        <x-{{ config('laravel-components.views-namespace') }}-form-label
            :label="{{ $label }}"
            :name="{{ $name }}"
            :type="{{ $type }}"
            :required="{{ $required }}"
            :classes="{{ $classes['label-component'] }}"
        />
    @endif
{{--    @if (isset($description) && filled($description))--}}
{{--        <div class="{{ $classes['description'] }}">--}}
{{--            {{ $description }}--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    <div class="{{ $classes['input-container'] }}">--}}
{{--        @if (isset($type) && filled($type) && $type === "select")--}}
{{--            <x-laravel-components-form-select--}}
{{--                :name="{{ $name ?? "" }}"--}}
{{--                :value="{{ $value ?? "" }}"--}}
{{--                :required="{{ $required ?? false }}"--}}
{{--                :options="{{ array_key_exists('options', $inputAttributes) && filled($inputAttributes['options']) ? $inputAttributes['options'] : [] }}"--}}
{{--                :classes="{{ array_key_exists('classes', $inputAttributes) && filled($inputAttributes['classes']) ? $inputAttributes['classes'] : [] }}"--}}
{{--                :attributes="{{ array_key_exists('attributes', $inputAttributes) && filled($inputAttributes['attributes']) ? $inputAttributes['attributes'] : [] }}"--}}
{{--            />--}}
{{--        @elseif (isset($type) && filled($type) && $type === "file")--}}
{{--            <x-form-file--}}
{{--                :name="{{ $name ?? "" }}"--}}
{{--                :button="{{ array_key_exists('button', $inputAttributes) && filled($inputAttributes['button']) ? $inputAttributes['button'] : [] }}"--}}
{{--                :classes="{{ array_key_exists('classes', $inputAttributes) && filled($inputAttributes['classes']) ? $inputAttributes['classes'] : [] }}"--}}
{{--                :attributes="{{ array_key_exists('attributes', $inputAttributes) && filled($inputAttributes['attributes']) ? $inputAttributes['attributes'] : [] }}"--}}
{{--            />--}}
{{--        @elseif (isset($type) && filled($type) && $type === "textarea")--}}
{{--            <x-form-textarea--}}
{{--                :name="{{ $name ?? "" }}"--}}
{{--                :value="{{ $value ?? "" }}"--}}
{{--                :required="{{ $required ?? false }}"--}}
{{--                :classes="{{ array_key_exists('classes', $inputAttributes) && filled($inputAttributes['classes']) ? $inputAttributes['classes'] : [] }}"--}}
{{--                :attributes="{{ array_key_exists('attributes', $inputAttributes) && filled($inputAttributes['attributes']) ? $inputAttributes['attributes'] : [] }}"--}}
{{--            />--}}
{{--        @elseif (isset($type) && filled($type) && $type === "date")--}}
{{--            --}}{{-- TODO - Include Date Input React Component --}}
{{--        @elseif (isset($type) && filled($type) && $type === "searchable-select")--}}
{{--            --}}{{-- TODO - Include Searchable Select React Component --}}
{{--        @elseif (isset($type) && filled($type) && $type === "file-uploader")--}}
{{--            --}}{{-- TODO - Include File Uploader React Component --}}
{{--        @elseif (isset($type) && filled($type) && $type === "image-uploader")--}}
{{--            --}}{{-- TODO - Include Image Uploader React Component --}}
{{--        @else--}}
{{--            <x-basic-input--}}
{{--                :name="{{ $name ?? "" }}"--}}
{{--                :value="{{ $value ?? "" }}"--}}
{{--                :required="{{ $required ?? false }}"--}}
{{--                :type="{{ $type ?? "text" }}"--}}
{{--                :classes="{{ array_key_exists('classes', $inputAttributes) && filled($inputAttributes['classes']) ? $inputAttributes['classes'] : [] }}"--}}
{{--                :attributes="{{ array_key_exists('attributes', $inputAttributes) && filled($inputAttributes['attributes']) ? $inputAttributes['attributes'] : [] }}"--}}
{{--            />--}}
{{--        @endif--}}
{{--    </div>--}}
{{--    @error($name)--}}
{{--        <x-form-error--}}
{{--            :error="{{ $message }}"--}}
{{--            :classes="{{ $classes['error-component'] }}"--}}
{{--        />--}}
{{--    @enderror--}}
</div>