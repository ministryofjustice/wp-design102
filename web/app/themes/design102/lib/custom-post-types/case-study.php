<?php

namespace Roots\Sage\CustomPostTypes;

class CaseStudy {
  public $postType = 'case-study';

  public function __construct() {
    add_action('init', [$this, 'register_post_type']);
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
}

return new CaseStudy();
