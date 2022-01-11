<button onClick="{{ $onClick }}" class="{{ $classes['container'] }}">
    @if(isset($icon) && filled($icon))
        <i class="{{ $classes['icon']." ".$icon }}"></i>
    @endif
    <span class="{{  $classes['label'] }}">
        {{ $label }}
    </span>
</button>