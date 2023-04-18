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
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();

mix.js('resources/js/react/form_generator.js', 'public/js/react/form_generator.js').react();
mix.js('resources/js/react/sale.js', 'public/js/react/sale.js').react();
mix.js('resources/js/react/company.js', 'public/js/react/company.js').react();

mix.browserSync({
    proxy: 'http://digicart_portal.test',
    external: true,
});