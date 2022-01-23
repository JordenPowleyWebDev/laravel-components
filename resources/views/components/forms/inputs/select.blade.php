<select
    id="{{ $name }}"
    name="{{ $name }}"
    class="{{ $classes['container'] }} @error($name){{ config('laravel-components.default-classes.components.form.inputs.select.invalid') }} @enderror"
    @if(isset($required) && $required === true)required @endif
    @if(isset($inputAttributes) && (sizeOf($inputAttributes) > 0))
        @foreach($inputAttributes as $key => $attribute)
            {{ $key }}="{{ $attribute }}"
        @endforeach
    @endif
>
    @if(isset($inputAttributes) && filled($inputAttributes) && array_key_exists('placeholder', $inputAttributes) && filled($inputAttributes['placeholder']))
        <option value="">{{ Str::title($inputAttributes['placeholder']) }}</option>
    @endif
    @foreach($options as $item)
        @if(filled($value) && $value === $item['value'])
            <option value="{{ $item['value'] }}" selected>{{ Str::title($item['label']) }}</option>
        @else
            <option value="{{ $item['value'] }}">{{ Str::title($item['label']) }}</option>
        @endif
    @endforeach
</select>