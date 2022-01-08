const mix   = require('laravel-mix');
const fs    = require('fs');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

const scssFiles = fs.readdirSync('resources/scss/components');

// Compile Main SCSS File
mix.sass('resources/scss/app.scss', 'dist/scss');

// Compile Individual SCSS Files
for (let i = 0; i < scssFiles.length; i++) {
    mix.sass('resources/scss/components/'+scssFiles[i], 'dist/scss/components');
}

// Compile Main JS File
mix.js('resources/js/app.js', 'dist/js')
    .react();

mix.js('resources/js/components/*', 'dist/js/components')
    .react();
