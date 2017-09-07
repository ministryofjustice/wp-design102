<header class="page-header-block">
  <h1><?= wptexturize($fields['heading']) ?></h1>
  <?php if (!empty($fields['subheading'])): ?>
    <div class="page-header-block__subheading"><?= wptexturize($fields['subheading']) ?></div>
  <?php endif; ?>
</header>
