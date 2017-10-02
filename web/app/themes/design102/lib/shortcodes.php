<?php

namespace Roots\Sage\Shortcodes;

include 'shortcodes/JobVacancies.php';

function trim_wrapper_paragraph($content) {
  $content = trim($content);
  $content = preg_replace('/^<\/p>/', '', $content);
  $content = preg_replace('/<p>$/', '', $content);
  return $content;
}

function testimonial($atts, $content = null) {
  $a = shortcode_atts([
    'person' => false,
    'org' => false,
  ], $atts);

  $out = trim_wrapper_paragraph($content);

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

add_shortcode('jobs_list', __NAMESPACE__ . '\\JobVacancies::shortcode_jobs_list');
add_shortcode('no_jobs', __NAMESPACE__ . '\\JobVacancies::shortcode_no_jobs');
