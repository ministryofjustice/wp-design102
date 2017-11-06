<?php

use Roots\Sage\Extras;

?>
<nav class="navbar navbar-expand-md fixed-top navbar-light">
    <div class="l-page-container">
        <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>">
          <img src="<?= Extras\asset_url('images/d102-logo.svg') ?>" alt="Design102" />
        </a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span> </span>
          <span> </span>
          <span> </span>
        </button>
        <div class="collapse navbar-collapse flex-row-reverse" id="navbarCollapse">
            <?php
            if (has_nav_menu('primary_navigation')) :
                wp_nav_menu([
                    'theme_location' => 'primary_navigation',
                    'menu_class' => 'navbar-nav',
                    'container' => false,
                    'walker' => new WP_Bootstrap_Navwalker(),
                    'link_before' => '<span>',
                    'link_after' => '</span>',
                ]);
            endif;
            ?>
        </div>
    </div>
</nav>
