<div class="{{ config('laravel-components.views-namespace')."-navigation-group-container ".config('laravel-components.default-classes.layouts.navigation.group.container') }}">
    @if (isset($label) && filled($label))
        <div class="{{ config('laravel-components.views-namespace')."-navigation-group-title-container ".config('laravel-components.default-classes.layouts.navigation.group.title-container') }}">
            @if(isset($icon) && filled($icon))
                <i class="{{ $icon }} {{ config('laravel-components.views-namespace')."-navigation-group-icon ".config('laravel-components.default-classes.layouts.navigation.group.icon') }}"></i>
            @endif
            <span class="{{ config('laravel-components.views-namespace')."-navigation-group-title ".config('laravel-components.default-classes.layouts.navigation.group.title') }}">{{ $label }}</span>
        </div>
    @endif
    @foreach($items as $item)
        @include(config('laravel-components.views-namespace').'::layouts.components.navigation.item', array_merge($item, ['grouped' => true]))
    @endforeach
</div>
