<div class="{{ $classes['container'] }}">
    <button class="{{ $classes['toggle'] }}" type="button" id="{{ $id }}"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ $label }}
    </button>
    <div class="{{ $classes['menu'] }}" aria-labelledby="{{ $id }}">
        @foreach($controls as $control)
            @if(array_key_exists("divider", $control))
                {{-- TODO - Import Dropdown Divider --}}
            @else
                {{-- TODO - Import Dropdown Divider --}}
            @endif
        @endforeach
    </div>
</div>