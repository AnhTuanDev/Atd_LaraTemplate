const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 */

mix.disableSuccessNotifications();

mix.setPublicPath('public_html/');

mix.js('resources/js/app.js', 'public_html/js')
    .postCss('resources/css/app.css', 'public_html/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ]);

if (mix.inProduction()) {
    mix.version();
}
