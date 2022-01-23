<input
    id="{{ $name }}"
    name="{{ $name }}"
    type="{{ isset($type) && filled($type) ? $type : "text" }}"
    class="{{ $classes['container'] }} @error($name){{ config('laravel-components.default-classes.components.form.inputs.input.invalid') }} @enderror"
    @if(isset($required) && $required === true)required @endif
    @if(isset($value) && filled($value))value="{{ $value }}" @endif
    @if(isset($inputAttributes) && (sizeOf($inputAttributes) > 0))
        @foreach($inputAttributes as $key => $attribute)
            {{ $key }}="{{ $attribute }}"
        @endforeach
    @endif
/>