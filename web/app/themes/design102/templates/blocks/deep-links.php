<div class="row">
  <?php foreach([1, 2] as $i): ?>
    <?php $link = $fields["link_$i"]; ?>
    <div class="col-sm-6">
      <section class="deep-link-block">
        <header>
          <h2><?= wptexturize($link['heading']) ?></h2>
          <?= wp_get_attachment_image($link['image']['id'], '4x3_small') ?>
        </header>

        <?= $link['text'] ?>
      </section>
    </div>
  <?php endforeach; ?>
</div>
