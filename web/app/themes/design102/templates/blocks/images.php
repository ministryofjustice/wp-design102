<div class="image-block">
  <?php
  $sizes = '(min-width: 1140px) 540px, (max-width: 575px) calc(100vw - 30px), calc(50vw - 30px)';
  ?>
  <div class="row">
    <div class="col-sm-6">
      <?= wp_get_attachment_image($fields['image_1']['ID'], '4x3_medium', false, ['sizes' => $sizes]) ?>
    </div>
    <div class="col-sm-6">
      <?= wp_get_attachment_image($fields['image_2']['ID'], '4x3_medium', false, ['sizes' => $sizes]) ?>
    </div>
  </div>
</div>
