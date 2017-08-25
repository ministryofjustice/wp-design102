<div class="testimonial-block">
  <blockquote class="testimonial">
    <?php

    echo $fields['quote'];

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
</div>
