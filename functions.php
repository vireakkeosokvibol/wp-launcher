<?php

// Disable direct access to file.
if (!defined('ABSPATH')) {
  die('Do not open this file directly.');
}

require_once(dirname(__FILE__) . '/classes/customizer.php');

/**
 * 
 * Add custom javascript and css.
 * 
 */
function add_scripts()
{
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.0.2', 'all');

  wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '3.7.1', true);
  wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '5.0.2', true);
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
  return !empty($menu_id) ? wp_get_nav_menu_items($menu_id) : array();
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
  $args = array();
  add_theme_support('custom-header', $args);
}
add_action('after_setup_theme', 'custom_header_option');

function mytheme_customize_css()
{
?>
  <style type="text/css">
    .main-header {
      background-color: <?php echo get_theme_mod('header_backgroundcolor', '000'); ?>;
    }

    .main-header a {
      color: <?php echo '#' . get_theme_mod('header_textcolor', '000'); ?>;
    }

    .main-header .dropdown-menu.show {
      background-color: <?php echo get_theme_mod('header_backgroundcolor', '000'); ?>;
    }

    .main-header .dropdown ul li a {
      color: <?php echo '#' . get_theme_mod('header_textcolor', '000'); ?>;
    }
  </style>
<?php
}
add_action('wp_head', 'mytheme_customize_css');
