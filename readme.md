# laravel-components
A component library of reusable bootstrap components for use within Laravel projects.

## Publishing
Blade views, JS components, SCSS files and the config can be published from this package
using the following syntax:
`php artisan vendor:publish --provider="JordenPowleyWebDev\LaravelComponents\LaravelComponentsServiceProvider" --tag="TAG"`

`TAG` can be replaced with the following tags to publish the corresponding files.

| Tag      | Details                                                                          |
|----------|----------------------------------------------------------------------------------|
| config   | Publishes the related config file                                                |
| scss     | Publishes the SCSS files to 'resources/vendor/laravel-components/scss'           |
| js       | Publishes the JS files to 'resources/vendor/laravel-components/js'               |
| views    | Publishes the Blade views files to 'resources/vendor/laravel-components/views'   |
| frontend | Publishes SCSS, JS & Blade views to 'resources/vendor/laravel-components'        |

### Available Components

| Component | Docs                                        |
|-----------|---------------------------------------------|
| Button    | [Blade Buttons](docs/controls/buttons.md)   |
| Card      | [Blade Card](docs/layout/card.md)           |
| Dropdown  | [Blade Dropdown](docs/controls/dropdown.md) |
