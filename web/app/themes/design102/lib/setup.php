<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup() {
  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/
  add_theme_support('soil-clean-up');
  add_theme_support('soil-nav-walker');
  add_theme_support('soil-nice-search');
  add_theme_support('soil-jquery-cdn');
  add_theme_support('soil-relative-urls');

  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain('sage', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'sage')
  ]);

  // Enable post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');
  set_post_thumbnail_size(400, 230, true);

  // Enable post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  add_theme_support('admin-bar', ['callback' => __NAMESPACE__ . '\\admin_bar_bump']);

  // Use main stylesheet for visual editor
  // To add custom styles edit /assets/styles/layouts/_tinymce.scss
  add_editor_style(Assets\asset_path('styles/main.css'));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

function add_image_sizes() {
  $sizes = [
    '4x3_large'  => [960, 720, true],
    '4x3_medium' => [720, 540, true],
    '4x3_small'  => [540, 405, true],
    '3x2_large'  => [960, 640, true],
    '3x2_medium' => [720, 480, true],
    '3x2_small'  => [540, 360, true],
    '2x1_large'  => [960, 480, true],
    '2x1_medium' => [720, 360, true],
    '2x1_small'  => [540, 270, true],
  ];

  foreach ($sizes as $name => $params) {
    add_image_size($name, $params[0], $params[1], $params[2]);
    add_image_size("{$name}_x2", ($params[0] * 2), ($params[1] * 2), $params[2]);
  }
}
add_action('after_setup_theme', __NAMESPACE__ . '\\add_image_sizes');

/**
 * Register sidebars
 */
function widgets_init() {
  register_sidebar([
    'name'          => __('Primary', 'sage'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);

  register_sidebar([
    'name'          => __('Footer', 'sage'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);
}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');

/**
 * Determine which pages should NOT display the sidebar
 */
function display_sidebar() {
  static $display;

  isset($display) || $display = !in_array(true, [
    // The sidebar will NOT be displayed if ANY of the following return true.
    // @link https://codex.wordpress.org/Conditional_Tags
    is_404(),
    is_front_page(),
    is_page_template('template-custom.php'),
  ]);

  return apply_filters('sage/display_sidebar', $display);
}

/**
 * Theme assets
 */
function assets() {
  wp_enqueue_style('sage/css', Assets\asset_path('styles/main.css'), false, null);

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_enqueue_script('sage/js', Assets\asset_path('scripts/main.js'), ['jquery'], null, true);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);

function admin_assets() {
  wp_enqueue_script('sage/admin_js', Assets\asset_path('scripts/wp-admin.js'), ['jquery'], null, true);
}
add_action('admin_enqueue_scripts', __NAMESPACE__ . '\\admin_assets');

/**
 * Admin Bar Bump
 * WordPress adds margin to the html element when the admin bar is showing.
 * We also need that margin on the navbar element, so we're tweaking
 * the default styling to add it.
 */
function admin_bar_bump() {
  ob_start();
  _admin_bar_bump_cb();
  $bump = ob_get_clean();
  echo str_replace('html {', 'html, .navbar.fixed-top {', $bump);
}

acf_add_options_page();

/**
 * Filter which content blocks are available for use on the post edit screen.
 *
 * Some content blocks are only to be used on specific post types.
 * For example: 'page_header' blocks can only be used on pages,
 *     and 'case_study_header' blocks can only be used on case studies.
 *
 * To configure which blocks are excluded from each post type, edit the
 * $exclude_layouts variable.
 *
 * @param $field
 * @return mixed
 */
function filter_content_block_layouts($field) {
  $exclude_layouts = [
    // 'post_type' => [ 'block_name' ]
    'page' => [
    ],
    'case-study' => [
      'page_header',
      'get_in_touch',
    ],
  ];

  $post_type = get_post_type();
  if (is_admin() && in_array($post_type, array_keys($exclude_layouts))) {
    $exclude = $exclude_layouts[$post_type];
    $field['layouts'] = array_filter($field['layouts'], function($layout) use ($exclude) {
      return !in_array($layout['name'], $exclude);
    });
  }

  return $field;
}
add_filter('acf/load_field/name=content_blocks', __NAMESPACE__ . '\\filter_content_block_layouts');

/**
 * Sort content block layouts alphabetically by name
 *
 * @param $field
 * @return mixed
 */
function sort_content_block_layouts($field) {
  if (is_admin()) {
    uasort($field['layouts'], function($a, $b) {
      return strcmp($a['name'], $b['name']);
    });
  }

  return $field;
}
add_filter('acf/load_field/name=content_blocks', __NAMESPACE__ . '\\sort_content_block_layouts');

/**
 * Filter which post types can be reordered
 */
function metronet_reorder_post_types($post_types) {
  $post_types = [
    'team-member' => 'team-member',
  ];
  return $post_types;
}
add_filter('metronet_reorder_post_types', __NAMESPACE__ . '\\metronet_reorder_post_types');

/**
 * Remove the 'Reorder' submenu item from Team Members post type menu.
 */
function remove_reorder_submenu_page() {
  remove_submenu_page('edit.php?post_type=team-member', 'reorder-team-member');
}
add_action('admin_menu', __NAMESPACE__ . '\\remove_reorder_submenu_page', 20);

/**
 * Give ACF the Google Maps API key
 */
function acf_google_maps_api_key($api) {
  if (defined('GOOGLE_MAPS_API_KEY')) {
    $api['key'] = GOOGLE_MAPS_API_KEY;
  }
  return $api;
}
add_filter('acf/fields/google_map/api', __NAMESPACE__ . '\\acf_google_maps_api_key');

// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
  array_unshift( $buttons, 'styleselect' );
  return $buttons;
}
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', __NAMESPACE__ . '\\my_mce_buttons_2' );

// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {
  // Define the style_formats array
  $style_formats = [
    // Each array child is a format with it's own settings
    [
      'title' => '2 column bullets',
      'selector' => 'ul',
      'classes' => 'two-cols',
    ],
  ];
  // Insert the array, JSON ENCODED, into 'style_formats'
  $init_array['style_formats'] = json_encode( $style_formats );

  return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', __NAMESPACE__ . '\\my_mce_before_init_insert_formats' );
