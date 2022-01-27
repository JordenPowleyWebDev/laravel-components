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
</head>
<body class="{{ config('laravel-components.views-namespace')."-pane-body ".config('laravel-components.default-classes.layouts.pane.body') }}">
<div id="app" class="{{ config('laravel-components.views-namespace')."-pane-app-div-outer ".config('laravel-components.default-classes.layouts.pane.app-div-outer') }}">
    <div class="{{ config('laravel-components.views-namespace')."-pane-app-div-inner ".config('laravel-components.default-classes.layouts.pane.app-div-inner') }}" style="width: 100%; height: 100vh;">
        <div class="{{ config('laravel-components.views-namespace')."-pane-app-div-col ".config('laravel-components.default-classes.layouts.pane.app-div-col') }}">
            <div class="{{ config('laravel-components.views-namespace')."-pane-app-name ".config('laravel-components.default-classes.layouts.pane.app-name') }}">
                {{ config('app.name', 'Laravel') }}
            </div>
            <div class="{{ config('laravel-components.views-namespace')."-pane-pane-container ".config('laravel-components.default-classes.layouts.pane.pane-container') }}">
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</div>
@include(config('laravel-components.views-namespace').'::components.toasts')
</body>
</html>
