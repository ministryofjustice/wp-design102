<div class="infographic-block">
  <?php foreach ($fields['icons'] as $icon): ?>
    <div class="infographic-block__icon">
      <?= wp_get_attachment_image($icon['image']['id'], 'full') ?>
      <p><?= wptexturize($icon['text']) ?></p>
    </div>
  <?php endforeach; ?>
</div>
