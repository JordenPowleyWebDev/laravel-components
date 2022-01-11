<div class="{{ $classes['container'] }}">
    <button class="{{ $classes['toggle'] }}" type="button" id="{{ $id }}"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ $label }}
    </button>
    <div class="{{ $classes['menu'] }}" aria-labelledby="{{ $id }}">
        {{ $slot }}
    </div>
</div>