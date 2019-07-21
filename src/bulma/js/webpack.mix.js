let mix = require('laravel-mix');
let tailwindcss = require('tailwindcss');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 | .sass('resources/assets/sass/app.sass', 'public/css')
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .js('resources/js/admin.js', 'public/js')
   .sass('resources/sass/bulma.sass', 'public/css/app.css')
   .styles([
        'resources/css/materialdesignicons.css',
        'resources/css/style.css'
   ], 'public/css/style.css');
