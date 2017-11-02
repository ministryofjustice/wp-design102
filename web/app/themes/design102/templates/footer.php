<?php

use Roots\Sage\Extras;

?>

<footer class="site-footer">
  <div class="l-page-container">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          &copy; <?= date('Y') ?> design102
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <?= get_field('footer_column_1', 'options') ?>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <?= get_field('footer_column_2', 'options') ?>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          Follow us on:
          <?php

          $social_links = get_field('social_media_links', 'options');

          foreach (['vimeo', 'twitter', 'instagram'] as $network) {
            if (!empty($social_links[$network])) {
              ?>
              <a href="<?= esc_url($social_links[$network]) ?>" target="_blank"><svg class="social-icon"><use xlink:href="<?= Extras\asset_url("images/social-icons.svg#$network") ?>" /></svg></a>
              <?php
            }
          }

          ?>
        </div>
    </div>
  </div>
</footer>
