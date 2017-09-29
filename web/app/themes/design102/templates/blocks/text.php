<?php

use Roots\Sage\Extras;

$class = ['text-block'];

if ($fields['background_colour'] == 'grey') {
  $class[] = 'text-block--light-grey';
}

?>

<div class="<?= Extras\class_attr($class) ?>">
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
