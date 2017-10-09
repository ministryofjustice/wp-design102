<?php

use Roots\Sage\Extras;

the_post();

?>
<div class="l-blocks">
  <?php

  Extras\render_block('page_header', [
    'heading' => get_the_title(),
    'intro_text' => get_field('contract_term'),
  ]);

  while (have_rows('content_blocks')) {
    the_row();

    $block_type = get_row_layout();
    $fields = get_row(true);

    Extras\render_block($block_type, $fields);
  }

  $application_url = get_field('application_url');
  if (!empty($application_url)) {
    Extras\render_block('job_vacancy_apply', ['application_url' => $application_url]);
  }

  ?>
</div>
