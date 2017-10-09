<?php

namespace Roots\Sage\CustomPostTypes;

class TeamMember {
  public $postType = 'team-member';

  public function __construct() {
    add_action('init', [$this, 'register_post_type']);
    add_action('init', [$this, 'register_taxonomy']);
  }

  public function register_post_type() {
    $args = [
      'labels' => [
        'name' => 'Team Members',
        'singular_name' => 'Team Member',
      ],
      'public' => true,
      'publicly_queryable' => false,
      'exclude_from_search' => true,
      'supports' => [
        'title',
      ],
      'has_archive' => false,
      'rewrite' => false,
      'menu_icon' => 'dashicons-admin-users',
    ];

    register_post_type($this->postType, $args);
  }

  function register_taxonomy() {
    register_taxonomy('team', $this->postType, [
      'labels' => [
        'name' => 'Teams',
        'singular_name' => 'Team',
        'search_items' => 'Search Teams',
        'all_items' => 'All Teams',
        'edit_item' => 'Edit Team',
        'update_item' => 'Update Team',
        'add_new_item' => 'Add New Team',
        'new_item_name' => 'New Team',
        'menu_name' => 'Teams',
      ],
      'publicly_queryable' => false,
      'rewrite' => false,
      'hierarchical' => true,
    ]);
  }
}

return new TeamMember();
