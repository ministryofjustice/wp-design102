<div class="image-block">
  <?php
  $sizes = '(min-width: 1140px) 540px, (max-width: 575px) calc(100vw - 30px), calc(50vw - 30px)';
  ?>
  <div class="row">
    <?php foreach (['image_1', 'image_2'] as $k): ?>
      <div class="col-sm-6">
        <?php

        $img_id = $fields[$k]['image']['ID'];
        $img_url = $fields[$k]['image']['url'];
        $caption = wptexturize($fields[$k]['caption']);

        ?>

        <a href="<?= esc_attr($img_url) ?>" class="zoomable mfp-zoom" title="<?= esc_attr($caption) ?>">
          <?= wp_get_attachment_image($img_id, '4x3_medium', false, ['sizes' => $sizes]) ?>
        </a>

        <?php if (!empty($caption)): ?>
          <p class="caption"><?= $caption ?></p>
        <?php endif; ?>

      </div>
    <?php endforeach; ?>
  </div>
</div>
