<?php

// Disable direct access to file.
if (!defined('ABSPATH')) {
  die('Do not open this file directly.');
}

/**
 * 
 * Add custom javascript and css.
 * 
*/
function add_scripts()
{
  wp_enqueue_style('uikit', get_template_directory_uri() . '/assets/css/uikit.min.css', array(), '3.7.1', 'all');

  wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '3.7.1', true);
  wp_enqueue_script('uikit', get_template_directory_uri() . '/assets/js/uikit.min.js', array(), '3.3.0', true);
  wp_enqueue_script('uikit-icons', get_template_directory_uri() . '/assets/js/uikit-icons.min.js', array(), '3.7.1', true);
  wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/custom.js', array(), '0.1', true);

}
add_action('wp_enqueue_scripts', 'add_scripts');

/**
 * 
 * Get menu and display menu in array format by menu's name.
 * 
 */
function get_menu($menu)
{
  $locations = get_nav_menu_locations();
  $menu_id = $locations[$menu];
  return ! empty($menu_id) ? wp_get_nav_menu_items($menu_id) : array();
}

add_theme_support('menus');

/**
 * 
 * Enable menu support on theme option.
 * 
*/
register_nav_menus(array(
  'header-menu' => __('Header menu', 'theme'),
  'footer-menu' => __('Footer menu', 'theme'),
));

/**
 * 
 * Eanble header support on theme option.
 * 
 */
function custom_header_option()
{
  $args = array(
    
  );
  add_theme_support('custom-header', $args);
}
add_action('after_setup_theme', 'custom_header_option');