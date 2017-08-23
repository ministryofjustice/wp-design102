<div class="text-block">
  <?php if ($fields['columns'] === '1'): ?>
    <?php // Single column layout ?>
    <div class="text-block__content">
      <?= $fields['column_1'] ?>
    </div>
  <?php else: ?>
    <?php // Two column layout ?>
    <div class="row">
      <div class="col-md-6">
        <div class="text-block__content">
          <?= $fields['column_1'] ?>
        </div>
      </div>
      <div class="col-md-6">
        <div class="text-block__content">
          <?= $fields['column_2'] ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>
