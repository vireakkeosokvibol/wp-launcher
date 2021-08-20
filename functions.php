<?php

// Disable direct access to file.
if (!defined('ABSPATH')) {
  die('Do not open this file directly.');
}

require_once(get_template_directory() . '/vendor/autoload.php');
require_once(get_template_directory() . '/admin/customize/controls/header-designer.php');

if (!function_exists('wp_launcher_setup')) {
  function wp_launcher_setup()
  {
    /*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
    add_theme_support('title-tag');

    /**
     * 
     * Enable menu support on theme option.
     * 
     */
    register_nav_menus(array(
      'header-menu' => __('Header menu', 'theme'),
      'footer-menu' => __('Footer menu', 'theme'),
    ));
  }
}
add_action('after_setup_theme', 'wp_launcher_setup');

/**
 * 
 * Add custom javascript and css to wp-admin page.
 * 
 */
function add_admin_scripts()
{
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '0.1');
  // wp_enqueue_script('jquery-min', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '0.1');
  // wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array(), '0.1');
}
add_action('admin_enqueue_scripts', 'add_admin_scripts');

/**
 * 
 * Add custom javascript and css to theme.
 * 
 */
function add_scripts()
{
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '0.1');
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

// Add custom css from theme options
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

/**
 * 
 * Customizer section
 * 
 */
function wp_launcher_customize_register($wp_customize)
{
  $wp_customize->add_panel('wp-launcher-customize-header-panel', array(
    'title' => __('Header Settings', 'wp-launcher'),
    'description' => __('Header settings configuration and customization', 'wp-launcher'),
    'panel' => 'wp_launcher_customize_header_panel'
  ));

  $wp_customize->add_section('wp-launcher-customize-header-navigation', array(
    'title' => 'Header navigations',
    'description' => 'Header navigation configuration and customization',
    'panel' => 'wp-launcher-customize-header-panel',
  ));

  $wp_customize->add_setting('wp-launcher-customize-header-menu-arrange', array(
    'default' => 'test',
    'transport'   => 'refresh',
  ));

  $wp_customize->add_control(new WP_Launcher_Customize_Control_Textarea($wp_customize, 'wp-launcher-customize-header-navigation', array(
    'section' => 'wp-launcher-customize-header-navigation',
    'settings' => 'wp-launcher-customize-header-menu-arrange',
    'type' => 'wp-launcher-textarea',
  )));
}
add_action('customize_register', 'wp_launcher_customize_register');
