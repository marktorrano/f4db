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
    mix
        .sass('ssr-fr.scss', 'public/assets/css/ssr-fr.css')
        .sass('tsa-fr.scss', 'public/assets/css/tsa-fr.css')
        .sass('ssr-nl.scss', 'public/assets/css/ssr-nl.css')
        .sass('tsa-nl.scss', 'public/assets/css/tsa-nl.css')
        .sass('print.scss', 'public/assets/css/print.css')
        .sass('login.scss', 'public/assets/css/login.css')
    ;

    mix.sass(['app.scss'], 'public/assets/css/app.css');

});
