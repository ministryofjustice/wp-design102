<?php

namespace Roots\Sage\Setup;

use \WP_Roles;
use \WP_User;

/**
 * Configure MOJ Digital user roles.
 * This renames the 'Administrator' role to 'Webmaster',
 * and creates a new role 'Web Administrator' which extends Editor role adding support for:
 *   – managing navigation menus
 *   – managing users
 *
 * Class MOJ_User_Roles
 */

class MOJ_User_Roles {
  /**
   * Holds the WP_Roles object.
   *
   * @var WP_Roles
   */
  protected $wp_roles = null;

  /**
   * Class constructor
   * Register hooks and filters.
   */
  public function __construct() {
    // Setup WP_Roles object
    global $wp_roles;
    if (!isset($wp_roles)) {
      $wp_roles = new WP_Roles();
    }
    $this->wp_roles = $wp_roles;

    $this->initRoles();
    add_filter('editable_roles', array(&$this, 'filterEditableRoles'));
    add_filter('map_meta_cap', array(&$this, 'filterMapMetaCap'), 10, 4);
    add_action('admin_menu', array(&$this, 'actionAdminMenu'), 999);
  }

  public function initRoles() {
    // Add web-administrator role if required
    if (!$this->roleExists('web-administrator')) {
      $this->addNewAdministratorRole();
    }

    // Rename administrator role if required
    $administratorName = 'Digital Webmaster';
    if ($this->roleName('administrator') !== $administratorName) {
      $this->renameRole('administrator', $administratorName);
    }
  }

  /**
   * Add new role Web Administrator.
   * Inherit capabilities from Editor role.
   */
  public function addNewAdministratorRole() {
    $editor = $this->wp_roles->get_role('editor');

    // Add a new role with editor caps
    $web_administrator = $this->wp_roles->add_role('web-administrator', 'Web Administrator', $editor->capabilities);

    // Additional capabilities which this role should have
    $additionalCapabilities = array(
      'list_users',
      'create_users',
      'edit_users',
      'delete_users',
      'edit_theme_options',
    );

    foreach ($additionalCapabilities as $cap) {
      $web_administrator->add_cap($cap);
    }
  }

  /**
   * Check if role exists
   *
   * @param $role
   * @return bool
   */
  public function roleExists($role) {
    $obj = $this->wp_roles->get_role($role);
    return !is_null($obj);
  }

  /**
   * Get the name of a role
   *
   * @param $role
   * @return bool
   */
  public function roleName($role) {
    $names = $this->wp_roles->get_names();
    if (isset($names[$role])) {
      return $names[$role];
    } else {
      return false;
    }
  }

  /**
   * Rename a user role
   *
   * @param $role
   * @param $name
   */
  public function renameRole($role, $name) {
    $this->wp_roles->roles[$role]['name'] = $name;
    $this->wp_roles->role_names[$role] = $name;
  }

  /**
   * Remove unwanted Appearance submenu items when logged in as a web-administrator
   */
  function actionAdminMenu() {
    if (current_user_can('web-administrator')) {
      remove_submenu_page('themes.php', 'themes.php');
    }
  }

  /**
   * Filter editable_roles
   * Remove 'Administrator' from the list of roles if the current user is not an admin.
   *
   * @param array $roles
   * @return array
   */
  public function filterEditableRoles($roles) {
    if (isset($roles['administrator']) && !current_user_can('administrator')) {
      unset($roles['administrator']);
    }

    uasort($roles, function($a, $b) {
      return (count($a['capabilities']) - count($b['capabilities'])) * -1;
    });

    return $roles;
  }

  /**
   * Filter map_meta_cap
   * Map meta capabilities to capabilities
   * If someone is trying to edit or delete an admin and that user isn't an admin, don't allow it.
   *
   * @param $caps
   * @param $cap
   * @param $user_id
   * @param $args
   * @return array
   */
  public function filterMapMetaCap($caps, $cap, $user_id, $args) {
    $mapCaps = [
      'edit_user',
      'remove_user',
      'promote_user',
      'delete_user',
      'delete_users',
    ];

    if (
      in_array($cap, $mapCaps) &&
      isset($args[0]) &&
      $this->disallowEditUser($user_id, $args[0])
    ) {
      $caps[] = 'do_not_allow';
    }

    return $caps;
  }

  /**
   * Determine if the current user is allowed to edit/delete/manage the specified user.
   * Non-administrators cannot edit administrators.
   *
   * @param int $actorId The user performing the action (i.e. the user performing the edit/deletion)
   * @param int $subjectId The user being acted upon (i.e. the user being edited/deleted)
   * @return bool
   */
  protected function disallowEditUser($actorId, $subjectId) {
    $actor = new WP_User($actorId);
    $subject = new WP_User($subjectId);

    return (
      !$actor->has_cap('administrator') &&
      $subject->has_cap('administrator')
    );
  }
}
