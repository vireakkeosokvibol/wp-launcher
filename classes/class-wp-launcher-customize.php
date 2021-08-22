<?php

declare(strict_types=1);

// Disable direct access to file.
if (!defined('ABSPATH')) {
  die('Do not open this file directly.');
}

if (!class_exists('WP_Launcher_Customize')) {

  class WP_Launcher_Customize
  {

    public function __construct()
    {
      add_action('customize_register', array($this, 'register'));
      add_action('admin_enqueue_scripts', array($this, 'admin_register_scripts'));
    }

    public function register($wp_customize): void
    {
      /**
       * Add Header settings panel
       */
      $wp_customize->add_panel('header', array(
        'title' => esc_html__('Header'),
        'description' => esc_html__('Header custmize and configuration.'),
        'panel' => 'header'
      ));

      /**
       * Add Header customizer section under  header-settings panel
       */
      $wp_customize->add_section('header-section', array(
        'title' => esc_html__('Customizer'),
        'description' => esc_html__('Header custmize and configuration.'),
        'panel' => 'header'
      ));

      $wp_customize->add_setting('header-section-customizer', array(
        'transport' => 'refresh',
      ));

      // Header Customizer.
      // Include the custom control class.
      include_once get_theme_file_path('classes/class-wp_launcher_customize_customizer_control.php');
      $wp_customize->add_control(new WP_Launcher_Customize_Customizer_Control($wp_customize, 'customizer', array(
        'label' => 'Customizer',
        'section' => 'header-section',
        'settings' => 'header-section-customizer',
        'type' => 'customizer'
      )));
    }

    public function admin_register_scripts(): void {
      
    }

  }

}
