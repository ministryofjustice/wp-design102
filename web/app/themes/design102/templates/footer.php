<?php

use Roots\Sage\Extras;

?>

<footer class="site-footer">
  <div class="container">
    <?php //dynamic_sidebar('sidebar-footer'); ?>

    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            Copyright &copy; <?= date('Y') ?> DESIGN102
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            102 Petty France<br/>
            London SW1H 9AJ, UK
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            info@design102.gov.uk<br/>
            +44 (0)20 3334 6222
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            Follow us on:
            <a href="#"><svg class="social-icon"><use xlink:href="<?= Extras\asset_url('images/social-icons.svg#vimeo') ?>" /></svg></a>
            <a href="#"><svg class="social-icon"><use xlink:href="<?= Extras\asset_url('images/social-icons.svg#twitter') ?>" /></svg></a>
            <a href="#"><svg class="social-icon"><use xlink:href="<?= Extras\asset_url('images/social-icons.svg#instagram') ?>" /></svg></a>
        </div>
    </div>
  </div>
</footer>
