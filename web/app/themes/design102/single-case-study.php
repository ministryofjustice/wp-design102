<?php

use Roots\Sage\Extras;

the_post();

?>
<div class="l-blocks">
  <?php

  Extras\render_block('case_study_header', ['heading' => get_the_title(), 'intro_text' => 'Some intro']);

  while (have_rows('content_blocks')) {
    the_row();

    $block_type = get_row_layout();
    $fields = get_row(true);

    Extras\render_block($block_type, $fields);
  }

  Extras\render_block('get_in_touch');

  ?>
</div>
