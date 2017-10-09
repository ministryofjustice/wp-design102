<div class="row">
  <?php foreach([1, 2] as $i): ?>
    <?php $link = $fields["link_$i"]; ?>
    <div class="col-sm-6">
      <div class="deep-link-block">

        <?php if (!empty($link['link_to_page'])): ?>
        <a href="<?= esc_attr($link['link_to_page']) ?>">
        <?php endif; ?>

        <div class="card text-white">
          <?= wp_get_attachment_image($link['image']['id'], '4x3_small', false, ['class' => 'card-img']) ?>
          <div class="card-img-overlay-gradient">
            <h2 class="card-title"><?= wptexturize($link['heading']) ?></h2>
          </div>
        </div>

        <?php if (!empty($link['link_to_page'])): ?>
        </a>
        <?php endif; ?>

        <?= $link['text'] ?>
      </div>
    </div>
  <?php endforeach; ?>
</div>
