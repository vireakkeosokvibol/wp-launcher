<?php

// Disable direct access to file.
if (!defined('ABSPATH')) {
  die('Do not open this file directly.');
}

require_once(dirname(__FILE__) . '/vendor/autoload.php');
require_once(dirname(__FILE__) . '/classes/customizer.php');
// require_once(dirname(__FILE__) . '/classes/navmenu.php');

/**
 * 
 * Add custom javascript and css.
 * 
 */

function add_scripts()
{
  // wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.0.2', 'all');

  // wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '3.7.1', true);
  // wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '5.0.2', true);
  wp_enqueue_script('main', get_template_directory_uri() . '/assets/dist/js/main.js', array(), '0.1', true);
}
add_action('wp_enqueue_scripts', 'add_scripts');

/**
 * 
 * Get menu and display menu in array format by menu's name.
 * 
 */
function wp_launcher_get_menu($menu)
{
  $locations = get_nav_menu_locations();
  $menu_id = $locations[$menu];
  return !empty($menu_id) ? wp_get_nav_menu_items($menu_id) : array();
}
add_theme_support('menus');

/**
 * 
 * Display nav menu
 * 
 */
function wp_launcher_display_menu($menu_name)
{
  $menu_objs = wp_launcher_get_menu($menu_name);
  foreach ($menu_objs as $item) {
    if ($item->menu_item_parent == 0) {
      $has_children = false;
      foreach ($menu_objs as $index => $subitem) {
        if ($item->ID == $subitem->menu_item_parent) {
          if ($has_children === false) {
            $has_children = true;
            echo '<li class="nav-item dropdown"><a href="" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">' . $item->title . '</a><ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">';
          }
          echo '<li><a href="" class="dropdown-item">' . $subitem->title . '</a></li>';
        }

        if ($index + 1 === count($menu_objs)) {
          if ($has_children) {
            $has_children = false;
            echo '</ul>';
          } else {
            echo '<li class="nav-item"><a href="" class="nav-link">' . $item->title . '</a>';
          }
          echo '</li>';
        }
      }
    }
  }
}

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
