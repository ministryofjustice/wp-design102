<?php

$case_studies = new WP_Query([
  'post_type' => 'case-study',
  'posts_per_page' => -1,
]);

if ($case_studies->have_posts()) {
  echo '<div class="l-blocks">';

  while ($case_studies->have_posts()) {
    $case_studies->the_post();

    // Open row div
    if ($case_studies->current_post % 2 == 0) {
      echo '<div class="row">';
    }

    echo '<div class="col-md-6">';
    get_template_part('templates/case-study-card');
    echo '</div>';

    // Close row div
    if ($case_studies->current_post % 2 == 1 || $case_studies->current_post + 1 == $case_studies->post_count) {
      echo '</div>';
    }
  }

  echo '</div>';
}
else {
  echo '<p>Nothing to show.</p>';
}

wp_reset_postdata();
