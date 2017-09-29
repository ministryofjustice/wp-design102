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

/**
 * Locate a block template file
 *
 * @param string $block_type The block type to render
 * @return string Path to the block template file
 * @throws \Exception
 */
function locate_block_template($block_type) {
  $template_name = str_replace('_', '-', $block_type);
  $template_path = locate_template("templates/blocks/$template_name.php");
  if (empty($template_path)) {
    throw new \Exception("Missing template for '$block_type' block");
  }
  return $template_path;
}

/**
 * Render a block
 *
 * @param string $block_type The block type to render
 * @param array $fields Key => value array of fields for the block
 * @return void
 */
function render_block($block_type, $fields = []) {
  try {
    $template_path = locate_block_template($block_type);
    echo '<div class="row"><div class="col">';
    include $template_path;
    echo '</div></div>';
  }
  catch (\Exception $e) {
    echo '<div class="alert alert-danger" role="alert">' . $e->getMessage() . '</div>';
  }
}

/**
 * Generate a string of CSS styles suitable for use
 * in an element's style attribute.
 *
 * @param array $styles Key => value array of style rules
 * @return string
 */
function style_attr($styles) {
  $out = '';
  foreach ($styles as $key => $value) {
    $out .= "$key: $value; ";
  }
  return esc_attr(rtrim($out));
}

/**
 * Generate a string of classes suitable for use
 * in an element's class attribute.
 *
 * @param array $classes Array of class names
 * @return string
 */
function class_attr($classes) {
  return implode(' ', $classes);
}

/**
 * Calculate which text colour to use (black or white)
 * based on the supplied background colour.
 *
 * @param string $hexcolor
 * @return string 'black' or 'white'
 */
function contrastingTextColour($hexcolor) {
  $hexcolor = preg_replace('/[#\s]/', '', $hexcolor);
  $r = hexdec(substr($hexcolor, 0, 2));
  $g = hexdec(substr($hexcolor, 2, 2));
  $b = hexdec(substr($hexcolor, 4, 2));
  $yiq = ( ($r*299) + ($g*587) + ($b*114) ) / 1000;
  return ( $yiq >= 128 ) ? 'black' : 'white';
}
