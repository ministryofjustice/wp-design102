<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('head'); ?>
  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_header();
    ?>
    <div class="l-page-container" role="document">
        <?php

        include Wrapper\template_path();

        ?>
    </div>
    <?php
      do_action('get_footer');
      get_footer();
    ?>
  </body>
</html>
