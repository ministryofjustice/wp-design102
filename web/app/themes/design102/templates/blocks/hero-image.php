<?php namespace Roots\Sage\Extras; ?>

<?php

$has_caption = (!empty($fields['heading']) || !empty($fields['subheading']));

?>

<div class="image-block">
  <div class="card text-white">
    <?php

    $sizes = '(min-width: 960px) 930px, calc(100vw - 30px)';
    echo wp_get_attachment_image($fields['image']['ID'], '2x1_large', false, ['sizes' => $sizes, 'class' => 'card-img']);

    ?>

    <?php if ($has_caption): ?>
      <div class="card-img-overlay-gradient">
        <h2 class="card-title"><?= wptexturize($fields['heading']) ?></h2>
        <?php if (!empty($fields['subheading'])): ?>
          <p class="card-text"><?= wptexturize($fields['subheading']) ?></p>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
</div>
