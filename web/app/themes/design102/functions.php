<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/custom-post-types/case-study.php', // CPT: Case Study
  'lib/custom-post-types/team-member.php', // CPT: Team Member
  'lib/custom-post-types/job-vacancy.php', // CPT: Job Vacancy
  'lib/moj-user-roles.php', // MOJ_User_Roles class
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/shortcodes.php',// Theme shortcodes
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/WP_Bootstrap_Navwalker.php',   // WP_Bootstrap_Navwalker
  'lib/customizer.php', // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
