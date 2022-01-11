<button type="button" class="{{ $classes['container'] }}"
        onclick="jQuery('#{{ $modal }}').modal('show');"
>
    @if(isset($icon) && filled($icon))
        <i class="{{ $classes['icon']." ".$icon }}"></i>
    @endif
    <span class="{{  $classes['label'] }}">
        {{ $label }}
    </span>
</button>