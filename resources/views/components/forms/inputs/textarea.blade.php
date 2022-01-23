<textarea
    id="{{ $name }}"
    name="{{ $name }}"
    class="{{ $classes['container'] }} @error($name){{ config('laravel-components.default-classes.components.form.inputs.textarea.invalid') }} @enderror"
    @if(isset($required) && $required === true)required @endif
    @if(isset($inputAttributes) && (sizeOf($inputAttributes) > 0))
        @foreach($inputAttributes as $key => $attribute)
            {{ $key }}="{{ $attribute }}"
        @endforeach
    @endif
>{{ $value }}</textarea>