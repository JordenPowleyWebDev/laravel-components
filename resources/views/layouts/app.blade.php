<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ isset($pageTitle) && filled($pageTitle) ? $pageTitle : config('app.name', 'Laravel') }}</title>

    <meta charset="utf-8">
    <meta name="author" content="Jorden Powley">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @routes
</head>
<body id="app" class="{{ config('laravel-components.views-namespace')."-app-body ".config('laravel-components.default-classes.layouts.app.body') }}">
    <div class="{{ config('laravel-components.views-namespace')."-app-app-div-outer ".config('laravel-components.default-classes.layouts.app.app-div-outer') }}">
        <div class="{{ config('laravel-components.views-namespace')."-app-app-div-inner ".config('laravel-components.default-classes.layouts.app.app-div-inner') }}">
            @if ((config('laravel-components.app-layout-settings.navigation.enabled') === true) && file_exists(config_path('navigation.php')))
                @include(config('laravel-components.views-namespace').'::layouts.components.navigation.upper-navbar')
                @include(config('laravel-components.views-namespace').'::layouts.components.navigation.side-navbar')
            @endif
            <main id="main-container" class="{{ config('laravel-components.views-namespace')."-app-app-div-col ".config('laravel-components.default-classes.layouts.app.app-div-col') }}">
                @if (config('laravel-components.app-layout-settings.breadcrumbs.enabled') === true)
                    <div class="{{ config('laravel-components.views-namespace')."-app-app-breadcrumb-container ".config('laravel-components.default-classes.layouts.app.app-breadcrumb-container') }}">
                        {{ Breadcrumbs::render() }}
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
    @include(config('laravel-components.views-namespace').'::components.toasts')
</body>
</html>
