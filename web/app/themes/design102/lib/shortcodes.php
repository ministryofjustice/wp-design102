<?php

namespace Roots\Sage\Shortcodes;

function testimonial($atts, $content = null) {
  $a = shortcode_atts([
    'name' => false,
  ], $atts);

  $out = $content;
  $out = trim($out);
  $out = preg_replace('/^<\/p>/', '', $out);
  $out = preg_replace('/<p>$/', '', $out);

  if (!empty($a['name'])) {
    $out .= '<cite>' . $a['name'] . '</cite>';
  }

  return '<blockquote class="testimonial">' . $out . '</blockquote>';
}

add_shortcode('testimonial', __NAMESPACE__ . '\\testimonial');
