<?php

use Roots\Sage\Extras;

$work = get_page_by_path('work');

$next = get_previous_post();
if (empty($next)) {
  $next = (new WP_Query([
    'posts_per_page' => 1,
    'order' => 'DESC',
    'post_type' => 'case-study',
  ]))->post;
  wp_reset_postdata();
}

?>

<div class="row">
  <div class="col-sm-6">
    <a href="<?= get_the_permalink($work) ?>" class="cs-nav">
      <div class="cs-nav__content">
        View all work
      </div>
    </a>
  </div>

  <div class="col-sm-6">
    <a href="<?= get_the_permalink($next) ?>" class="cs-nav cs-nav--right">
      <div class="cs-nav__content">
        Next project
        <div class="cs-nav__name">
          <span>
            <?= Extras\substr_with_ellipsis(get_the_title($next), 30) ?>
          </span>
        </div>
      </div>
    </a>
  </div>
</div>
