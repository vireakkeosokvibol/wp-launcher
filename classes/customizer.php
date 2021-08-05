<?php

// Disable direct access to file.
if (!defined('ABSPATH')) {
  die('Do not open this file directly.');
}

class LAUNCHER_CUSTOMIZER
{
  function __construct()
  {
    add_action('customize_register', array($this, 'add_color_section'));
    add_action('customize_register', array($this, 'add_sections'));
  }

  function add_color_section($wp_customize)
  {
    //All our sections, settings, and controls will be added here
    $wp_customize->add_setting('header_textcolor', array(
      'default'     => "000000",
      'transport'   => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_textcolor', array(
      'label'        => __('Header Text Color', 'theme'),
      'section'    => 'colors',
    )));

    $wp_customize->add_setting('header_backgroundcolor', array(
      'default'     => "efefef",
      'transport'   => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_backgroundcolor', array(
      'label' => __('Header Background Color', 'theme'),
      'section' => 'colors',
    )));
  }

  function add_sections($wp_customize)
  {
    $wp_customize->add_panel('header-panel', array(
      'capability'     => 'edit_theme_options',
      'title'          => __('Header Settings', 'theme'),
      'description'    =>  __('Header elements configuration', 'theme'),
      'panel'  => 'header-panel',
    ));

    $wp_customize->add_section('header-navigation', array(
      'title' => 'Header Navigation',
      'description' => __('Customize header section'),
      'panel' => 'header-panel' 
    ));

    $wp_customize->add_setting('header-menu-arrange', array(
      'default' => 'flex-start',
      'transport'   => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'header-menu-arrange', array(
      'label' => 'Arrange Menu',
      'section' => 'header-navigation',
      'settings' => 'header-menu-arrange',
      'type' => 'select',
      'choices' => array('flex-start' => 'Left', 'center' => 'Center', 'flex-end' => 'Right')
    )));
  }
}

if (class_exists('LAUNCHER_CUSTOMIZER')) {
  new LAUNCHER_CUSTOMIZER();
}
