<?php namespace Roots\Sage\Extras; ?>

<div class="image-block">
    <?php

    $sizes = '(min-width: 960px) 930px, calc(100vw - 30px)';
    $img_id = $fields['image']['ID'];
    $caption = wptexturize($fields['caption']);

    ?>

    <?= wp_get_attachment_image($img_id, '2x1_large', false, ['sizes' => $sizes]) ?>

    <?php if (!empty($caption)): ?>
      <p class="caption"><?= $caption ?></p>
    <?php endif; ?>
</div>
