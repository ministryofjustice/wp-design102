<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/**
 * Return the URL to a theme asset in the 'dist' directory.
 *
 * @param string $path Path to the asset
 * @return string URL for the asset
 */
function asset_url($path) {
    return esc_url(get_stylesheet_directory_uri() . '/dist/' . $path);
}

/**
 * Adjust URL parameters used for embedded YouTube iframe players
 * to 'unbrand' it:
 *   - use modest YouTube branding
 *   - don't show related videos at the end
 *   - hide annotations
 *   - don't show the video title & uploader info
 *
 * @param string $iframe The YouTube iframe HTML
 * @return string Adjusted iframe HTML
 */
function unbrand_youtube_iframe($iframe) {
  // If this isn't a YouTube iframe, do nothing
  if (stripos($iframe, 'youtube.com') === false || stripos($iframe, ' src=') === false) {
    return $iframe;
  }

  preg_match('/src="(.+?)"/', $iframe, $matches);
  $src = $matches[1];

  $params = [
    'feature' => 'oembed',
    'modestbranding' => 1,
    'rel' => 0,
    'showinfo' => 0,
    'iv_load_policy' => 3,
  ];

  $new_src = add_query_arg($params, $src);

  return str_replace($src, $new_src, $iframe);
}
