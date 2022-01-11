<div class="{{ $classes['container'] }}">
    <button class="{{ $classes['toggle'] }}" type="button" id="{{ $id }}"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ $label }}
    </button>
    <ul class="{{ $classes['menu'] }}" aria-labelledby="{{ $id }}">
        {{ $slot }}
    </ul>
</div>