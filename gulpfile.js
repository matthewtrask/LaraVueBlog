var elixir = require('laravel-elixir');

require('laravel-elixir-vueify');
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
elixir(function (mix) {
    mix.sass(
        'app.scss', // Source files
        'public/css', // Destination folder
        {includePaths: ['vendor/bower_components/foundation-sites/scss/']}
    );

    //// Compile JavaScript
    mix.scripts(['modernizr.js', 'jquery.min.js', 'foundation.min.js', 'custom.js']);

    mix.browserify('main.js');


});
