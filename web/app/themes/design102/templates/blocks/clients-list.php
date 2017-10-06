<div class="text-block">

  <div class="text-block__content">

    <h2><?= wptexturize($fields['heading']) ?></h2>
    <?= $fields['introductory_text'] ?>

    <div class="clients-list">
      <?php

      foreach (array_slice($fields['clients'], 0, 4) as $i => $client) {
        echo '<div class="clients-list__client">';
        echo wp_get_attachment_image($client['logo']['id'], 'full');
        echo '</div>';
      }

      ?>
    </div>

    <div class="clients-list expandable__content">
      <?php

      foreach (array_slice($fields['clients'], 4) as $i => $client) {
        echo '<div class="clients-list__client">';
        echo wp_get_attachment_image($client['logo']['id'], 'full');
        echo '</div>';
      }

      ?>
    </div>
    <div class="expandable__trigger">
      <a href="#" class="btn">Show all clients</a>
    </div>

  </div>

</div>
