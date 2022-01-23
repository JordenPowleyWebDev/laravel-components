<div class="{{ $classes['container'] }}">
    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="file"
        class="{{ $classes['input'] }}"
        @if(isset($inputAttributes) && (sizeOf($inputAttributes) > 0))
            @foreach($inputAttributes as $key => $attribute)
                {{ $key }}="{{ $attribute }}"
            @endforeach
        @endif
    />
    @if (isset($button) && filled($button))
        <label class="{{ $classes['label-container'] }}" for="{{ $name }}">
            @if (array_key_exists("icon", $button) && filled($button['icon']))
                <i class="{{ $button['icon'] }} @if (array_key_exists("label", $button) && filled($button['label'])){{ config('laravel-components.default-classes.components.form.inputs.file.label-icon') }} @endif"></i>
            @endif
            @if (array_key_exists("label", $button) && filled($button['label']))
                <span class="{{ $classes['label-text'] }}">{{ $button['label'] }}</span>
            @endif
        </label>
    @endif
</div>