/**
 * The data layer management script for GTM
 */

var gtmID = 'GTM-PFVJSWN';

// ******************************/
// redefine the local dataLayer
// ******************************/

mojGtm = [{}];

(function (w, d, s, l, i) {
    w[l] = w[l] || [];
    w[l].push({
        'gtm.start':
            new Date().getTime(), event: 'gtm.js'
    });
    var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
    j.async = true;
    j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
    f.parentNode.insertBefore(j, f);
})(window, document, 'script', 'mojGtm', gtmID);


/**
 * Wrap the dataLayer.push function
 * @param event
 * @param object
 * @private
 */
function _trackEvent(event, object) {
    if (!object) {
        mojGtm.push({'event': event});
        return;
    }

    mojGtm.push($.extend({}, {'event': event}, object));
}

/**
 * Determine exactly what element was clicked and return its jQuery equivalent
 * @param event
 * @returns {jQuery|HTMLElement}
 * @private
 */
function _jq_target(event) {
    return $(event.target);
}

/**
 * Using jQuery, add meaningful data to mojGtm (aka the dataLayer)
 * https://developers.google.com/tag-manager/devguide
 */
jQuery(function ($) {
    //@example: when an element gets a click, pass the inner text to the dataLater
    /*
        $('.target-element').on('click', function () {
            var event  = 'target-element-click',
                object = {'addToTheDataLayer': $(this).text()};
            _trackEvent(event, object);
        });
    */
});
