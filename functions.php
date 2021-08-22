<?php

declare(strict_types=1);

// Disable direct access to file.
if (!defined('ABSPATH')) {
  die('Do not open this file directly.');
}

// This theme requires WordPress 5.3 or later.
if (version_compare($GLOBALS['wp_version'], '5.0', '<')) {
  wp_die('WP Launcher require Wordpress 5.0 to work properly');
}

if (!function_exists('wp_launcher_setup')) {
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   *
   * @since WP Launcher 1.0
   *
   * @return void
   */
  function wp_launcher_setup(): void
  {
    /*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
    add_theme_support('title-tag');

    register_nav_menus(
      array(
        'primary' => esc_html__('Primary menu', 'wp-launcher'),
        'footer'  => __('Secondary menu', 'wp-launcher'),

      )
    );
  }
  add_action('after_setup_theme', 'wp_launcher_setup');
}

function register_scripts()
{
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.1');
}
add_action('wp_enqueue_scripts', 'register_scripts');

// Customizer additions.
require get_template_directory() . '/classes/class-wp-launcher-customize.php';
new WP_Launcher_Customize();
