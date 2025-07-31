const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/content.scss', 'public/css')
    .sass('resources/sass/elements.scss', 'public/css')
    .sass('resources/sass/fixed.scss', 'public/css')
    .sass('resources/sass/news.scss', 'public/css')
    .sass('resources/sass/windows.scss', 'public/css');
