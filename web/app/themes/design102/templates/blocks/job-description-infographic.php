<?php

use Roots\Sage\Extras;

Extras\render_block('infographic', [
  'icons' => get_field('job_description_infographic_icons', 'options'),
]);
