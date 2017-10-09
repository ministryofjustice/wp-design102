<?php

use Roots\Sage\Extras;

$style = [];
$class = ['testimonial-block'];
if (!empty($fields['background_colour'])) {
  $style['background-color'] = $fields['background_colour'];
  if (Extras\contrastingTextColour($fields['background_colour']) == 'white') {
    $class[] = 'text-white';
  }
}

?>

<div class="<?= Extras\class_attr($class) ?>"<?php if (!empty($style)) echo ' style="' . Extras\style_attr($style) . '"'; ?>>
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

  <?php

  if (!empty($fields['strapline'])) {
    echo '<div class="testimonial-block__strapline">';
    echo $fields['strapline'];
    echo '</div>';
  }

  ?>
</div>
