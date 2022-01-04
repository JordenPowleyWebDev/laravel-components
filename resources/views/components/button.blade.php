@if (isset($type) && $type === "submit")
    <button type="submit" class="btn {{ config('components.default-classes.components.button') }} {{ $classes }}">
        {{ $label }}
    </button>
@elseif (isset($href) && filled($href))
    <a href="{{ $href }}"
       class="btn {{ config('components.default-classes.components.button') }} {{ $classes }}"
    >
        {{ $label }}
    </a>
@elseif (isset($onClick) && filled($onClick))
    <button onClick="{{ $onClick }}" class="btn {{ config('components.default-classes.components.button') }} {{ $classes }}">
        {{ $label }}
    </button>
@elseif (isset($modal) && filled($modal))
    <button type="button" class="btn {{ config('components.default-classes.components.button') }} {{ $classes }}"
            onclick="jQuery('#{{ $modal }}').modal('show');"
    >
        {{ $label }}
    </button>
@endif
