<a href="#" class="team-member">

  <div class="team-member__photo">
    <?php

    $photo = get_field('photo');
    $animation = get_field('hover_animation');

    ?>
    <?= wp_get_attachment_image($photo['ID'], [500, 472]) ?>
    <?php if (!empty($animation)): ?>
      <video src="<?= $animation['url'] ?>" muted preload="none"></video>
    <?php endif; ?>
  </div>

  <div class="team-member__name"><?php the_title(); ?></div>
  <div class="team-member__job-role"><?php the_field('job_role'); ?></div>

</a>
