<nav class="{{ config('laravel-components.views-namespace')."-navigation-upper-navbar-container ".config('laravel-components.default-classes.layouts.navigation.upper-navbar.container') }}" id="upper-navbar">
    <div class="{{ config('laravel-components.views-namespace')."-navigation-upper-navbar-control-container ".config('laravel-components.default-classes.layouts.navigation.upper-navbar.control-container') }}">
        <div class="{{ config('laravel-components.views-namespace')."-navigation-upper-navbar-nav-logo ".config('laravel-components.default-classes.layouts.navigation.upper-navbar.nav-logo') }}">
            <a href="{{ route(config('laravel-components.nav-home-name') }}" class="{{ config('laravel-components.views-namespace')."-navigation-upper-navbar-nav-link ".config('laravel-components.default-classes.layouts.navigation.upper-navbar.nav-link') }}">{{ config('app.name') }}</a>
        </div>
        <button class="{{ config('laravel-components.views-namespace')."-navigation-upper-navbar-toggle-button ".config('laravel-components.default-classes.layouts.navigation.upper-navbar.toggle-button') }}" type="button"
                data-toggle="collapse" data-target="#upper-nav-content"
                aria-controls="upper-nav-content" aria-expanded="false" aria-label="Toggle navigation">
            <span class="{{ config('laravel-components.views-namespace')."-navigation-upper-navbar-toggle-button-icon ".config('laravel-components.default-classes.layouts.navigation.upper-navbar.toggle-button-icon') }}"></span>
        </button>
    </div>
    <div class="{{ config('laravel-components.views-namespace')."-navigation-upper-navbar-nav-container ".config('laravel-components.default-classes.layouts.navigation.upper-navbar.nav-container') }}" id="upper-nav-content">
        @include(config('laravel-components.views-namespace').'::layouts.components.navigation.array')
    </div>
</nav>
