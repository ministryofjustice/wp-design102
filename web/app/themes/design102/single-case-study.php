<?php

use Roots\Sage\Extras;

the_post();

?>
<div class="l-blocks">
  <?php

  while(have_rows('content_blocks')):
    the_row();

    $block_type = get_row_layout();
    $fields = get_row(true);

    ?>
    <div class="row">
      <div class="col">
        <?php

        try {
          Extras\render_block($block_type, $fields);
        }
        catch (Exception $e) {
          echo '<div class="alert alert-danger" role="alert">' . $e->getMessage() . '</div>';
        }

        ?>
      </div>
    </div>
  <?php endwhile; ?>
</div>
