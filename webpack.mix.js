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
    .js([
        'public/js/vendor/carusel-articulos.js'
        ],'public/js/main.js')
    .js([
        'public/js/vendor/sb-admin-2',
    ],'public/js/admin.js')
    .sass('resources/sass/app.scss', 'public/css')
    .styles([
        'public/css/vendor/sunpro.css',
        'public/css/vendor/carusel-articulos.css'
    ], 'public/css/main.css')
    .styles([
        'public/css/vendor/sb-admin-2.css',
    ],'public/css/admin.css');