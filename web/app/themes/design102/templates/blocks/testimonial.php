<div class="testimonial-block text-white">
  <blockquote class="testimonial">
    <div class="testimonial__quote">
      <?= $fields['quote'] ?>
    </div>

    <?php

    if (!empty($fields['person'])) {
      echo '<footer>' . wptexturize($fields['person']) . '</footer>';
    }

    ?>
  </blockquote>

  <?php

  if (!empty($fields['button_text']) && !empty($fields['button_link'])) {
    echo '<div class="testimonial-block__cta">';
    echo sprintf(
      '<a href="%s" class="btn btn-orange-outline-white">%s</a>',
      esc_attr($fields['button_link']),
      wptexturize($fields['button_text'])
    );
    echo '</div>';
  }

  ?>
</div>
