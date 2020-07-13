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

mix.styles([
    'resources/assets/css/bootstrap.min.css',
    'resources/assets/css/slider.css',
    'resources/assets/css/hover-min.css',
    'resources/assets/css/style.css',
    'resources/assets/css/animate.css',
    'resources/assets/css/jquery.fancybox.css',
    'resources/assets/css/slick.css',
    'resources/assets/css/ionicons.min.css',
],'public/css/all.css')

.scripts([
    'resources/assets/js/jquery.min.js',
    'resources/assets/js/jquery.fancybox.js',
    'resources/assets/js/jquery.form.js',
    'resources/assets/js/jquery.validate.min.js',
    'resources/assets/js/bootstrap.min.js',
    'resources/assets/js/slider.js',
    'resources/assets/js/jslick.min.js',
    'resources/assets/js/wow.min.js',
    'resources/assets/js/main.js'

],'public/js/all.js')

.js(['resources/js/app.js'],'public/js/app.js');