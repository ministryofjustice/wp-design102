<?php

use Roots\Sage\Extras;

$case_studies = new WP_Query([
  'post_type' => 'case-study',
  'posts_per_page' => -1,
  'post__not_in' => [get_the_ID()],
]);

if ($case_studies->have_posts()):
?>
<div class="carousel-block">
  <?php

  if (!empty($fields['heading'])) {
    echo '<h2>' . wptexturize($fields['heading']) . '</h2>';
  }

  ?>
  <div class="carousel">
    <ul class="carousel__slides">
      <?php while ($case_studies->have_posts()): $case_studies->the_post(); ?>
        <li>
          <a href="<?php the_permalink(); ?>" class="carousel__thumb">
            <?php the_post_thumbnail(); ?>
            <div class="overlay">
              <?php the_title(); ?>
            </div>
          </a>
        </li>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    </ul>
    <a href="#" class="carousel__prev"><svg><use xlink:href="<?= Extras\asset_url('images/carousel-arrows.svg#left') ?>" /></svg></a>
    <a href="#" class="carousel__next"><svg><use xlink:href="<?= Extras\asset_url('images/carousel-arrows.svg#right') ?>" /></svg></a>
  </div>
</div>
<?php endif; ?>
