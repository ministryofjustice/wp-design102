<header class="page-header-block">
  <h1 class="page-header-block__header"><?= wptexturize($fields['heading']) ?></h1>
  <?php if (!empty($fields['intro_text'])): ?>
    <div class="page-header-block__intro"><?= wptexturize($fields['intro_text']) ?></div>
  <?php endif; ?>
</header>
