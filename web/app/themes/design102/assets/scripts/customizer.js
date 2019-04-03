(function ($) {
    // Site title
    if (typeof wp.customize === 'function') {
        wp.customize('blogname', function (value) {
            value.bind(function (to) {
                $('.brand').text(to);
            });
        });
    } else {
        if (console && console.log) {
            console.log("The object 'wp.customize' is available in the customizer");
        }
    }
})(jQuery);
