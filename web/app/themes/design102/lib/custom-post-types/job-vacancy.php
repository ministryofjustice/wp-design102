<?php

namespace Roots\Sage\CustomPostTypes;

class JobVacancy {
  public $postType = 'job-vacancy';

  public function __construct() {
    add_action('init', [$this, 'register_post_type']);
  }

  public function register_post_type() {
    $args = [
      'labels' => [
        'name' => 'Job Vacancies',
        'singular_name' => 'Job Vacancy',
      ],
      'public' => true,
      'supports' => [
        'title',
        'revisions',
      ],
      'has_archive' => false,
      'rewrite' => [
        'slug' => 'vacancies',
        'with_front' => false,
        'pages' => false,
      ],
    ];

    register_post_type($this->postType, $args);
  }
}

return new JobVacancy();
