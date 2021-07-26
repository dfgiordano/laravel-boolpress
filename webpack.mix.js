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
//creo un altro file da caricare poi nel front.js cambiandogli il nome
    .js('resources/js/front.js', 'public/js').vue()
    .sass('resources/sass/app.scss', 'public/css');
