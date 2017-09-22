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
          <?php

          $style = [
            'background-image' => 'url("' . $slide['image']['sizes']['large'] . '")'
          ];

          ?>
          <a href="<?= esc_attr($slide['link_to_page']) ?>" class="carousel__slide" style="<?= Extras\style_attr($style) ?>">
            <?php $sizes = '(min-width: 960px) 930px, calc(100vw - 30px)'; ?>
            <div class="overlay">
              <h1><?= wptexturize($slide['heading']) ?></h1>
              <h2><?= wptexturize($slide['subheading']) ?></h2>
            </div>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>
<?php endif; ?>
