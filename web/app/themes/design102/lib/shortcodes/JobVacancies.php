<?php
/**
 * Created by PhpStorm.
 * User: ollietreend
 * Date: 02/10/2017
 * Time: 21:26
 */

namespace Roots\Sage\Shortcodes;

use \WP_Query;
use \WP_Post;

class JobVacancies {
  public static function shortcode_no_jobs($atts, $content = '') {
    if (self::has_job_vacancies()) return '';
    return trim_wrapper_paragraph($content);
  }

  public static function shortcode_jobs_list($atts, $content = '') {
    if (!self::has_job_vacancies()) return '';

    $content = trim_wrapper_paragraph($content);

    $vacancies = self::get_job_vacancies();
    $content .= '<ul>';
    foreach ($vacancies as $vacancy) {
      $content .= '<li>';
      $content .= sprintf(
        '<a href="%s">%s</a>',
        get_the_permalink($vacancy),
        get_the_title($vacancy)
      );
      $content .= '</li>';
    }
    $content .= '</ul>';

    return $content;
  }

  /**
   * Get all the live job vacancies
   *
   * @return WP_Post[]
   */
  protected static function get_job_vacancies() {
    $posts = new WP_Query([
      'post_type' => 'job-vacancy',
      'posts_per_page' => -1,
      'orderby' => 'title',
      'order' => 'ASC',
    ]);

    return $posts->posts;
  }

  /**
   * Determine if there are live job vacancies
   *
   * @return bool
   */
  protected static function has_job_vacancies() {
    return !empty(self::get_job_vacancies());
  }
}
