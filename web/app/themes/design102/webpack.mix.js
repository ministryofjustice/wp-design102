const mix_ = require('laravel-mix');

mix_.setPublicPath('./dist/');

mix_.js(
    [
        'assets/scripts/main.js',
        'assets/scripts/moj-gtm.js'
    ], 'js/main.min.js')
    .copy('./node_modules/jquery/dist/jquery.min.js', 'dist/js/')
    .copy('./node_modules/slick-carousel/slick/slick.min.js', 'dist/js/')
    .copy('./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', 'dist/js/') // bundle includes popper
    .copy('./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', 'dist/js/') // bundle includes popper
    .copy('./node_modules/magnific-popup/dist/jquery.magnific-popup.js', 'dist/js/')
    .scripts([
        'assets/scripts/customizer.js',
        'assets/scripts/wp-admin.js'
    ], 'dist/js/wp-admin.js')
    .sass('assets/styles/main.scss', 'css/main.min.css').options({processCssUrls: false})
    .copy('assets/images/*.{jpg,jpeg,png,gif,svg,ico}', 'dist/images/')
    .copy('assets/images/static/*.{jpg,jpeg,png,gif,svg,ico}', 'dist/images/static/');

if (mix_.inProduction()) {
    mix_.version();
} else {
    mix_.sourceMaps();
}
