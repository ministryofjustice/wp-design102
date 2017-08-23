<?php

use Roots\Sage\Extras;

$jumbo = ( $fields['background_image'] !== false );

$class = ['page-header-block'];
if ($jumbo) {
  $class[] = 'page-header-block--jumbo';
  $styles = [
    'background-image' => 'url("' . $fields['background_image']['sizes']['large'] . '")',
  ];
}

?>
<header class="<?= implode(' ', $class) ?>"<?php if (isset($styles)) echo ' style="' . Extras\style_attr($styles) . '"'; ?>>
  <h1><?= wptexturize($fields['heading']) ?></h1>
  <?php if (!empty($fields['subheading'])): ?>
    <div class="page-header-block__subheading"><?= wptexturize($fields['subheading']) ?></div>
  <?php endif; ?>
</header>
