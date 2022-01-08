<a href="{{ $href }}"
   @if(isset($target) && filled($target))
   target="{{ $target }}"
   @endif
   class="{{ $classes['container'] }}"
>
    @if(isset($icon) && filled($icon))
        <i class="{{ $classes['icon']." ".$icon }}"></i>
    @endif
    <span class="{{  $classes['label'] }}">
        {{ $label }}
    </span>
</a>