<div class="testimonial-block">
  <blockquote class="testimonial">
    <div class="testimonial__quote">
      <?= $fields['quote'] ?>
    </div>

    <?php

    $person = !empty($fields['person']) ? wptexturize($fields['person']) : false;
    $org = !empty($fields['organisation']) ? wptexturize($fields['organisation']) : false;
    if ($person || $org) {
      echo '<footer>';
      if ($person) echo '<div class="person">' . $person . '</div>';
      if ($org) echo '<div class="org">' . $org . '</div>';
      echo '</footer>';
    }

    ?>
  </blockquote>

  <?php if (!empty($fields['link_to_page']) && !empty($fields['link_text'])): ?>
  <a href="<?= $fields['link_to_page'] ?>" class="btn"><?= wptexturize($fields['link_text']) ?></a>
  <?php endif; ?>
</div>
