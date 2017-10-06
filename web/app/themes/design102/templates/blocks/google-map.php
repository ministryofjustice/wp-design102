<?php

$embed_url = 'https://www.google.com/maps/embed/v1/place';
$params = [
  'q' => $fields['location']['address'],
  'zoom' => $fields['zoom'],
  'key' => GOOGLE_MAPS_API_KEY,
];
$embed_url = add_query_arg($params, $embed_url);

?>
<div class="google-map-block">
  <iframe src="<?= esc_url($embed_url) ?>" frameborder="0"></iframe>
</div>
