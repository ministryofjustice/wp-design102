<?php

use Roots\Sage\Extras;

$style = [];
$class = ['testimonial-block'];
$btn_class = ['btn btn-lg'];

if (empty($fields['background_colour'])) {
  $fields['background_colour'] = '#EB6600';
}
else {
  $style['background-color'] = $fields['background_colour'];
}

if (Extras\contrastingTextColour($fields['background_colour']) == 'white') {
  $class[] = 'text-white';
  $btn_class[] = 'btn-outline-white';
}
else {
  $btn_class[] = 'btn-outline-primary';
}

?>

<div class="<?= Extras\class_attr($class) ?>"<?php if (!empty($style)) echo ' style="' . Extras\style_attr($style) . '"'; ?>>
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
      '<a href="%s" class="%s">%s</a>',
      esc_attr($fields['button_link']),
      esc_attr(implode(' ', $btn_class)),
      wptexturize($fields['button_text'])
    );
    echo '</div>';
  }

  ?>
</div>
