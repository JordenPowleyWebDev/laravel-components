@foreach (config('navigation.items') as $navItem)
    @if (array_key_exists('type', $navItem) && $navItem['type'] === "grouped")
        @include(config('laravel-components.views-namespace').'::layouts.components.navigation.group', $navItem)
    @else
        @include(config('laravel-components.views-namespace').'::layouts.components.navigation.item', $navItem)
    @endif
@endforeach