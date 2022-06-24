<nav class="{{ config('laravel-components.views-namespace')."-navigation-side-navbar-container ".config('laravel-components.default-classes.layouts.navigation.side-navbar.container') }}" id="side-navbar">
    <div class="{{ config('laravel-components.views-namespace')."-navigation-side-navbar-nav-logo ".config('laravel-components.default-classes.layouts.navigation.side-navbar.nav-logo') }}">
        <a href="{{ route(config('laravel-components.nav-home-name')) }}" class="{{ config('laravel-components.views-namespace')."-navigation-side-navbar-nav-link ".config('laravel-components.default-classes.layouts.navigation.side-navbar.nav-link') }}">{{ config('app.name') }}</a>
    </div>
    @include(config('laravel-components.views-namespace').'::layouts.components.navigation.array')
</nav>
