<?php

$project_category = get_query_var('category');
if (empty($project_category)) {
  $project_category = null;
}

$case_studies = new WP_Query([
  'post_type' => 'case-study',
  'posts_per_page' => -1,
  'project_category' => $project_category,
]);

get_template_part('templates/case-study-filter');

if ($case_studies->have_posts()) {
  echo '<div class="l-blocks">';

  echo '<div class="row"><div class="col">';
  $case_studies->the_post();
  get_template_part('templates/case-study-card', 'large');
  echo '</div></div>';

  while ($case_studies->have_posts()) {
    $case_studies->the_post();

    // Open row div
    if ($case_studies->current_post % 2 == 1) {
      echo '<div class="row">';
    }

    echo '<div class="col-md-6">';
    get_template_part('templates/case-study-card');
    echo '</div>';

    // Close row div
    if ($case_studies->current_post % 2 == 0 || $case_studies->current_post + 1 == $case_studies->post_count) {
      echo '</div>';
    }
  }

  echo '</div>';
}
else {
  echo '<p>Nothing to show.</p>';
}

wp_reset_postdata();
