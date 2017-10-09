<div class="image-block">
  <?php
  $sizes = '(min-width: 1140px) 540px, (max-width: 575px) calc(100vw - 30px), calc(50vw - 30px)';
  ?>
  <div class="row">
    <div class="col-sm-6">
      <a href="<?= $fields['image_1']['image']['url'] ?>" class="zoomable mfp-zoom" title="<?= esc_attr($fields['image_1']['caption']) ?>">
        <?= wp_get_attachment_image($fields['image_1']['image']['ID'], '4x3_medium', false, ['sizes' => $sizes]) ?>
      </a>
    </div>
    <div class="col-sm-6">
      <a href="<?= $fields['image_2']['image']['url'] ?>" class="zoomable mfp-zoom" title="<?= esc_attr($fields['image_2']['caption']) ?>">
        <?= wp_get_attachment_image($fields['image_2']['image']['ID'], '4x3_medium', false, ['sizes' => $sizes]) ?>
      </a>
    </div>
  </div>
</div>
