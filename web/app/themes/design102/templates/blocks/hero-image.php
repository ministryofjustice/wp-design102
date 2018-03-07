<?php use Roots\Sage\Extras; ?>

<div class="image-block">
  <?php

  if ($fields['type'] == 'image') {
    $sizes = '(min-width: 960px) 930px, calc(100vw - 30px)';
    $img_id = $fields['image']['ID'];
    echo wp_get_attachment_image($img_id, '2x1_large', false, ['sizes' => $sizes]);
  }
  else {
    echo Extras\mp4_animation($fields['animation']['url']);
  }

  ?>

  <?php if (!empty($fields['caption'])): ?>
    <p class="caption"><?= wptexturize($fields['caption']) ?></p>
  <?php endif; ?>
</div>
