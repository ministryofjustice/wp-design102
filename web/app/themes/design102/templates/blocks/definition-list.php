<div class="definition-list-block">
  <div class="definition-list-block__content">
    <h2><?= wptexturize($fields['heading']) ?></h2>
      <?php foreach ($fields['summary_fields'] as $row): ?>
    <dl class="row">
        <dt class="col-sm-3"><?= wptexturize($row['key']) ?></dt>
        <dd class="col-sm-9"><?= wptexturize($row['value']) ?></dd>
    </dl>
      <?php endforeach; ?>
  </div>
</div>
