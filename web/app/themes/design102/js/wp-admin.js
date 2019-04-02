(function($) {
  // Site title
  wp.customize('blogname', function(value) {
    value.bind(function(to) {
      $('.brand').text(to);
    });
  });
})(jQuery);

(function($) {

  /**
   * Persist the zoom level of the ACF Google Map
   * in 'google_map' content blocks.
   */
  acf.add_action('google_map_init', function( map, marker, $field ) {

    // Only run if this is a 'google_map' content block
    if ($field.parents('.layout').data('layout') !== 'google_map') {
      return false;
    }

    // Hide the 'zoom level' field
    $field.parent().find('.zoom-level').hide();

    var $zoomLevel = $field.parent().find('.zoom-level input[type=number]');

    // Set zoom level on page load
    if (!isNaN(parseInt($zoomLevel.val()))) {
      map.setZoom(parseInt($zoomLevel.val()));
    }

    // Update zoom level field when map zoom is changed
    google.maps.event.addListener(map, 'zoom_changed', function( e ) {
      var zoom = map.getZoom();
      $zoomLevel.val(zoom).change();
    });

  });

})(jQuery);
