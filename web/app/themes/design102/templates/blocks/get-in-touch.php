<?php

$strapline = get_field('get_in_touch_strapline', 'options');
$button_text = get_field('get_in_touch_button_text', 'options');
$button_link = get_field('get_in_touch_button_link', 'options');

?>

<div class="call-to-action-block">
  <p><?= wptexturize($strapline) ?></p>
  <a href="<?= $button_link ?>" class="btn btn-outline-primary btn-lg"><?= wptexturize($button_text) ?></a>
</div>
