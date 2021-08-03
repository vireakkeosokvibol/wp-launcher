<?php

// Disable direct access to file.
if (!defined('ABSPATH')) {
  die('Do not open this file directly.');
}

class WP_LAUNCHER_WIDGET extends WP_Widget
{
  function __construct()
  {
    $widget_args = array(
      'classname' => 'wp-launcher-widget',
      'description' => 'Custom Launcher Profile Widget',
    );
    parent::__construct('launcher_profile', 'Launcher Profile', $widget_args);
  }

}

add_action('widgets_init', function () {
  register_widget('WP_LAUNCHER_WIDGET');
});
