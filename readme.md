# laravel-components
A component library of reusable bootstrap components for use within Laravel projects.

## Publishing
Blade views, JS components, SCSS files and the config can be published from this package
using the following syntax:
`php artisan vendor:publish --provider="JordenPowleyWebDev\LaravelComponents\LaravelComponentsServiceProvider" --tag="TAG"`

`TAG` can be replaced with the following tags to publish the corresponding files.

| Tag         | Details                                                                          |
|-------------|----------------------------------------------------------------------------------|
| config      | Publishes the related config file                                                |
| breadcrumbs | Publishes the related config file                                                |
| config      | Publishes the related config file                                                |
| navigation  | Publishes the SCSS files to 'resources/vendor/laravel-components/scss'           |
| js          | Publishes the JS files to 'resources/vendor/laravel-components/js'               |
| views       | Publishes the Blade views files to 'resources/vendor/laravel-components/views'   |
| frontend    | Publishes SCSS, JS & Blade views to 'resources/vendor/laravel-components'        |

### Available Components

| Component          | Docs                                                    |
|--------------------|---------------------------------------------------------|
| Button             | [Blade Button Component](docs/controls/buttons.md)      |
| Card               | [Blade Card Components](docs/layout/card.md)            |
| Dropdown           | [Blade Dropdown Components](docs/controls/dropdown.md)  |
| Forms              | [Blade Form Components](docs/forms/forms.md)            |
| Pane Layout        | [Blade Pane Layout](docs/layout/pane.md)                |
| App Layout         | [Blade App Layout](docs/layout/app.md)                  |
| Confirmation Modal | [Blade Confirmation Modal](docs/modals/confirmation.md) |
