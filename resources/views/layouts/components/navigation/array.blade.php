@foreach (config('navigation.items') as $navItem)
    @if (!array_key_exists('can', $navItem) || (array_key_exists('can', $navItem) && array_key_exists('permission', $navItem['can']) && array_key_exists('model', $navItem['can']) && Auth::user()->can($navItem['can']['permission'], $navItem['can']['model'])))
        @if (array_key_exists('type', $navItem) && $navItem['type'] === "grouped")
            @include(config('laravel-components.views-namespace').'::layouts.components.navigation.group', $navItem)
        @else
            @include(config('laravel-components.views-namespace').'::layouts.components.navigation.item', $navItem)
        @endif
    @endif
@endforeach