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
        .sass('app.scss', 'public/css/app.css')
        .sass('ssr-fr.scss', 'public/css/ssr-fr.css')
        .sass('tsa-fr.scss', 'public/css/tsa-fr.css')
        .sass('ssr-nl.scss', 'public/css/ssr-nl.css')
        .sass('tsa-nl.scss', 'public/css/tsa-nl.css')
    ;

    mix.styles([
        'app.css'
    ], null, 'public/css');

});
