const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/admin/base.js', 'public/js')
    .js('resources/js/admin/customer.js', 'public/js')
    .js('resources/js/admin/order.js', 'public/js')
    .js('resources/js/admin/product.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
