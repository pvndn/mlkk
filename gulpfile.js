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
    mix.styles([
    	'style.css'
    ], 'public/css/app.css');

    mix.styles([
    	'320.css'
    ], 'public/css/320.css');

    mix.styles([
    	'480.css'
    ], 'public/css/480.css');

    mix.styles([
    	'640.css'
    ], 'public/css/640.css');

    mix.styles([
    	'768.css'
    ], 'public/css/768.css');

    mix.styles([
    	'928.css'
    ], 'public/css/928.css');

    mix.styles([
    	'1024.css',
    ], 'public/css/1024.css');

    mix.styles([
    	'bootstrap.min.css'
    ], 'public/css/bootstrap.css');

    mix.styles([
    	'flexslider.css'
    ], 'public/css/flexslider.css');

    mix.styles([
    	'sweetalert.css'
    ], 'public/css/sweetalert.css');

    // mix.styles([
    // 	'wizard.css'
    // ], 'public/css/wizard.css');

    mix.scripts([
    	'bootstrap.min.js'
    ], 'public/js/bootstrap.js');

    mix.scripts([
    	'main.js'
    ], 'public/js/app.js');

    mix.scripts([
        'imagezoom.js'
    ], 'public/js/imagezoom.js');

    mix.scripts([
        'slider.js'
    ], 'public/js/slider.js');

    mix.scripts([
        'sweetalert-dev.js'
    ], 'public/js/sweetalert.js');

    mix.scripts([
        'validator.js'
    ], 'public/js/validator.js');

    mix.scripts([
        'jquery.easy-autocomplete.js'
    ], 'public/js/autocomplete.js');

    mix.version([
    	'css/app.css',
    	'css/320.css',
    	'css/480.css',
    	'css/640.css',
    	'css/768.css',
    	'css/bootstrap.css',
    	'css/928.css',
    	'css/1024.css',
      'css/flexslider.css',
      'css/sweetalert.css',
      // 'css/wizard.css',

    	'js/bootstrap.js',
    	'js/imagezoom.js',
    	'js/slider.js',
    	'js/app.js',
    	'js/validator.js',
    	'js/sweetalert.js',
    	'js/autocomplete.js'
    	// 'js/wizard.js'
    ]);
});
