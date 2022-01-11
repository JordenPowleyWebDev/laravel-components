<button type="submit" class="{{ $classes['container'] }}"
        @if(isset($form) && filled($form))form="{{ $form }}" @endif
>
    @if(isset($icon) && filled($icon))
        <i class="{{ $classes['icon']." ".$icon }}"></i>
    @endif
    <span class="{{  $classes['label'] }}">
        {{ $label }}
    </span>
</button>