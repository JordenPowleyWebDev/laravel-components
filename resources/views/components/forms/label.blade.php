@if(!isset($type) || (isset($type) && filled($type) && !in_array($type, ["file"])))
    <label for="{{ $name }}" class="{{ $classes['container'] }}">{{ $label }}</label>
@else
    <div class="{{ $classes['container'] }}">{{ $label }}</div>
@endif