<?php

$term = get_term($fields['team'], 'team');

?>

<div class="team-members-block">
  <?php

  $members = new WP_Query([
    'post_type' => 'team-member',
    'posts_per_page' => -1,
    'tax_query' => [
      [
        'taxonomy' => 'team',
        'field' => 'term_id',
        'terms' => $term->term_id,
      ]
    ],
    'meta_key' => "_reorder_term_team_{$term->slug}",
    'orderby' => 'meta_value_num title',
    'order' => 'ASC',
  ]);

  ?>

  <h2><?= wptexturize($fields['heading']) ?></h2>

  <?= $fields['introductory_text'] ?>

  <?php

  while ($members->have_posts()) {
    $members->the_post();

    if ($members->current_post % 4 == 0) {
      echo '<div class="row">';
    }

    echo '<div class="col-md-3 col-6">';
    get_template_part('templates/team-member');
    echo '</div>';

    if ($members->current_post % 4 == 3 || $members->current_post == ($members->post_count - 1)) {
      echo '</div>';
    }

    if ($members->current_post == 3) {
      echo '<div class="expandable__content">';
    }
    if ($members->current_post == ($members->post_count - 1)) {
      echo '</div>';
    }
  }

  ?>

  <?php if ($members->post_count > 4): ?>
  <div class="expandable__trigger">
    <a href="#" class="btn">See more people</a>
  </div>
  <?php endif; ?>

  <?php wp_reset_postdata(); ?>
</div>
