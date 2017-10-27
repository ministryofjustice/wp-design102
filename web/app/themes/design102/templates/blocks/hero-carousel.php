<?php

use Roots\Sage\Extras;

?>

<?php if (!empty($fields['slides'])): ?>
<div class="hero-carousel-block">
  <?php

  if (!empty($fields['heading'])) {
    echo '<h2>' . wptexturize($fields['heading']) . '</h2>';
  }

  ?>
  <div class="carousel">
    <ul class="carousel__slides">
      <?php foreach ($fields['slides'] as $slide): ?>
        <li>
          <?php if (!empty($slide['link_to_page'])): ?>
          <a href="<?= esc_attr($slide['link_to_page']) ?>">
          <?php endif; ?>

            <div class="card text-white">
              <?=
              wp_get_attachment_image(
                $slide['image']['id'],
                '3x2_large',
                false,
                [
                  'class' => 'card-img',
                  'sizes' => '(min-width: 960px) 930px, calc(100vw - 30px)'
                ]
              )
              ?>
              <?php if (!empty($slide['heading'])): ?>
                <div class="card-img-overlay-gradient">
                  <h2 class="card-title"><?= wptexturize($slide['heading']) ?></h2>
                  <?php if (!empty($slide['subheading'])): ?>
                    <p class="card-text"><?= wptexturize($slide['subheading']) ?></p>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
            </div>

          <?php if (!empty($slide['link_to_page'])): ?>
          </a>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>
<?php endif; ?>
