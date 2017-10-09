<?php

namespace Roots\Sage\CustomPostTypes;

class CaseStudy {
  public $postType = 'case-study';

  public function __construct() {
    add_action('init', [$this, 'register_post_type']);
    add_action('init', [$this, 'register_taxonomy']);
    add_filter('query_vars', [$this, 'add_query_vars']);
  }

  public function register_post_type() {
    $args = [
      'labels' => [
        'name' => 'Case Studies',
        'singular_name' => 'Case Study',
      ],
      'public' => true,
      'supports' => [
        'title',
        'thumbnail',
        'revisions',
      ],
      'has_archive' => false,
      'rewrite' => [
        'slug' => 'work',
        'with_front' => false,
        'pages' => false,
      ],
    ];

    register_post_type($this->postType, $args);
  }

  function register_taxonomy() {
    register_taxonomy('project_category', $this->postType, [
      'labels' => [
        'name' => 'Project Categories',
        'singular_name' => 'Category',
        'search_items' => 'Search Categories',
        'all_items' => 'All Categories',
        'edit_item' => 'Edit Category',
        'update_item' => 'Update Category',
        'add_new_item' => 'Add New Category',
        'new_item_name' => 'New Category',
        'menu_name' => 'Categories',
      ],
      'rewrite' => false,
      'hierarchical' => true,
      'query_var' => true,
    ]);
  }

  /**
   * Filter to add 'category' query var
   *
   * @param array $vars
   * @return array
   */
  function add_query_vars($vars){
    $vars[] = 'category';
    return $vars;
  }
}

return new CaseStudy();
