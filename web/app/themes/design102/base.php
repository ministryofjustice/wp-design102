<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

do_action('get_header');
get_header();
?>
    <div id="content" class="l-page-container" role="document">
        <?php

        include Wrapper\template_path();

        ?>
    </div>
<?php
  do_action('get_footer');
  get_footer();
?>
