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
    .js('resources/js/booking.index.js', 'public/js')
    .js('resources/js/account.index.js', 'public/js')
    .js('resources/js/address.index.js', 'public/js')
    .js('resources/js/tariff.js', 'public/js')
    .js('resources/js/tariff.view.js', 'public/js')
    .js('resources/js/customers.js', 'public/js')
    .js('resources/js/carrier.index.js', 'public/js')
    .js('resources/js/carrier.profile.js', 'public/js')
    .js('resources/js/customer.profile.js', 'public/js')
    .js('resources/js/bookings.review.js', 'public/js')
    .js('resources/js/surcharges.index.js', 'public/js')
    .js('resources/js/remoteareas.index.js', 'public/js')
    .js('resources/js/services.index.js', 'public/js')
    .js('resources/js/booking.confirmation.js', 'public/js')
    .js('resources/js/bookingHistory.index.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/booking.index.scss', 'public/css')
    .sass('resources/sass/booking.service.scss', 'public/css')
    .sass('resources/sass/surcharges.index.scss', 'public/css')
    .sass('resources/sass/master.scss', 'public/css')
    .sass('resources/sass/account.index.scss', 'public/css')
    .sass('resources/sass/address.index.scss', 'public/css')
    .sass('resources/sass/tariff.scss', 'public/css')
    .sass('resources/sass/tariff.view.scss', 'public/css')
    .sass('resources/sass/carrier.scss', 'public/css')
    .sass('resources/sass/bookings.review.scss', 'public/css')
    .sass('resources/sass/remoteareas.index.scss', 'public/css')
    .sass('resources/sass/services.index.scss', 'public/css')
    .sass('resources/sass/booking.confirmation.scss', 'public/css')
    .sass('resources/sass/carrier.profile.scss', 'public/css')
    .sass('resources/sass/customer.profile.scss', 'public/css')
    .sass('resources/sass/bookingHistory.index.scss', 'public/css');
