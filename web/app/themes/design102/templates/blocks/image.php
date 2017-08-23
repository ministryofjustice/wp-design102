<?php namespace Roots\Sage\Extras; ?>

<div class="image-block">
  <?php
  if ($fields['columns'] === '1') {
    // Single column layout
    $sizes = '(min-width: 1140px) 1110px, calc(100vw - 30px)';
    echo wp_get_attachment_image($fields['image_1']['ID'], 'large', false, ['sizes' => $sizes]);
  }
  else {
    // Two column layout
    $sizes = '(min-width: 1140px) 540px, (max-width: 575px) calc(100vw - 30px), calc(50vw - 30px)';
    ?>
    <div class="row">
      <div class="col-sm-6">
        <?= wp_get_attachment_image($fields['image_1']['ID'], 'large', false, ['sizes' => $sizes]) ?>
      </div>
      <div class="col-sm-6">
        <?= wp_get_attachment_image($fields['image_2']['ID'], 'large', false, ['sizes' => $sizes]) ?>
      </div>
    </div>
    <?php
  }
  ?>
</div>
