<div class="text-block">

  <div class="text-block__content">

    <h2><?= wptexturize($fields['heading']) ?></h2>
    <?= $fields['introductory_text'] ?>

    <div class="clients-list">
      <?php

      foreach ($fields['clients'] as $i => $client){
        if ($i % 4 == 0) {
          echo '<div class="row">';
        }

        echo '<div class="col">';

        echo wp_get_attachment_image($client['logo']['id']);

        echo '</div>';

        if ($i % 4 == 3 || $i == count($fields['clients']) - 1) {
          echo '</div>';
        }
      }

      ?>
    </div>

  </div>

</div>
