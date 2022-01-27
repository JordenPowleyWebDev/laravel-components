@php
$classes = "";
if (isset($grouped) && $grouped == true) {
    $classes = config('laravel-components.views-namespace')."-navigation-item-container-group ".config('laravel-components.default-classes.layouts.navigation.item.container-group');
} else {
    $classes = config('laravel-components.views-namespace')."-navigation-item-container ".config('laravel-components.default-classes.layouts.navigation.item.container');
}

if (isset($active) && $active === true) {
    $classes = $classes." ".config('laravel-components.views-namespace')."-navigation-item-active ".config('laravel-components.default-classes.layouts.navigation.group.item.active');
}

@endphp
<a href="{{ $link }}" class="{{ $classes }}">
    @if(isset($icon) && filled($icon))
        <i class="{{ $icon }} {{ config('laravel-components.views-namespace')."-navigation-item-icon ".config('laravel-components.default-classes.layouts.navigation.item.icon') }}"></i>
    @elseif(isset($grouped) && $grouped)
        <i class="{{ config('laravel-components.views-namespace')."-navigation-item-grouped-icon ".config('laravel-components.default-classes.layouts.navigation.item.grouped-icon') }}" style="color: transparent;"></i>
    @endif
    <span class="{{ config('laravel-components.views-namespace')."-navigation-item-label ".config('laravel-components.default-classes.layouts.navigation.item.label') }}">{{ $label }}</span>
</a>
