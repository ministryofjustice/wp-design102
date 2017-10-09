<a href="<?php the_permalink(); ?>">
  <div class="card text-white">
    <?= the_post_thumbnail('4x3_medium', ['class' => 'card-img']); ?>
    <div class="card-img-overlay-gradient">
      <h2 class="card-title"><?php the_title(); ?></h2>
      <p class="card-text"><?php the_field('client'); ?></p>
    </div>
  </div>
</a>
