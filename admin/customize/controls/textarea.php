<?php

if (class_exists('WP_Customize_Control')) {
  class WP_Launcher_Customize_Control_Textarea extends WP_Customize_Control
  {
    public $type = 'textarea';

    public function enqueue()
    {
      wp_enqueue_script('jquery-ui-slider');
      wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array(), '0.1', true);
    }

    public function render_content()
    {
      require_once(get_template_directory() . '/admin/customize/controls/templates/header.designer.php');
    }
  }
}
