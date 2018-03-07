<?php use Roots\Sage\Extras; ?>

<div class="image-block">
  <?php
  $sizes = '(min-width: 1140px) 540px, (max-width: 575px) calc(100vw - 30px), calc(50vw - 30px)';
  ?>
  <div class="row">
    <?php foreach (['image_1', 'image_2'] as $k): ?>
      <?php $f = $fields[$k]; ?>
      <div class="col-sm-6">
        <?php

        if ($f['type'] == 'image') {
          $sizes = '(min-width: 960px) 930px, calc(100vw - 30px)';
          $img_id = $f['image']['ID'];
          $img_url = $f['image']['url'];
          $caption = wptexturize($f['caption']);

          echo '<a href="' . esc_attr($img_url) . '" class="zoomable mfp-zoom" title="' . esc_attr($caption) . '">';
          echo wp_get_attachment_image($img_id, '4x3_medium', false, ['sizes' => $sizes]);
          echo '</a>';
        }
        else {
          echo Extras\mp4_animation($f['animation']['url']);
        }

        ?>

        <?php if (!empty($f['caption'])): ?>
          <p class="caption"><?= wptexturize($f['caption']) ?></p>
        <?php endif; ?>

      </div>
    <?php endforeach; ?>
  </div>
</div>
