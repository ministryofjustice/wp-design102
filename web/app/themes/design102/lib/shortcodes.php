<?php

namespace Roots\Sage\Shortcodes;

function testimonial($atts, $content = null) {
  $a = shortcode_atts([
    'person' => false,
    'org' => false,
  ], $atts);

  $out = $content;
  $out = trim($out);
  $out = preg_replace('/^<\/p>/', '', $out);
  $out = preg_replace('/<p>$/', '', $out);

  $person = !empty($a['person']) ? wptexturize($a['person']) : false;
  $org = !empty($a['org']) ? wptexturize($a['org']) : false;
  if ($person || $org) {
    $out .= '<footer>';
    if ($person) $out .= '<div class="person">' . $person . '</div>';
    if ($org) $out .= '<div class="org">' . $org . '</div>';
    $out .= '</footer>';
  }

  return '<blockquote class="testimonial">' . $out . '</blockquote>';
}

add_shortcode('testimonial', __NAMESPACE__ . '\\testimonial');
