var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
        .sass('login.scss')
        .coffee('app.coffee')
        .styles([
            './bower_components/lato-webfont/css/lato-webfont.css',
            './bower_components/font-awesome/css/font-awesome.css',
            './bower_components/bootstrap/dist/css/bootstrap.css',
            './bower_components/ekko-lightbox/dist/ekko-lightbox.css',
            './bower_components/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css',
            './bower_components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css'
        ], 'public/css/vendor.css')
        .scripts([
            './bower_components/sugar/release/sugar-full.development.js',
            './bower_components/jquery/dist/jquery.js',
            './bower_components/jquerymy/jquerymy.js',
            './bower_components/ekko-lightbox/dist/ekko-lightbox.js',
            './bower_components/Chart.js/dist/Chart.js',
            './bower_components/bootstrap/dist/js/bootstrap.js',
            './bower_components/bs-confirmation/bootstrap-confirmation.js',
            './bower_components/bootstrap-switch/dist/js/bootstrap-switch.js'
        ], 'public/js/vendor.js')
        .copy('./bower_components/bootstrap/dist/fonts', 'public/fonts')
        .copy('./bower_components/font-awesome/fonts', 'public/fonts')
        .copy('./bower_components/lato-webfont/fonts', 'public/fonts')
        .copy('./bower_components/lightbox2/dist/images', 'public/images');
});
