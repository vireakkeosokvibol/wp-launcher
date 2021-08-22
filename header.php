<!DOCTYPE html>
<html lang="en">

<head>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <nav class="navbar navbar-expand-lg main-header">
    <div class="container">
      <a href="navbar-brand"><?php echo get_bloginfo('name'); ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown" style="justify-content: <?php echo get_theme_mod('header-menu-arrange', 'flex-start'); ?>;">
        <ul class="navbar-nav">
        
        </ul>
      </div>
    </div>
  </nav>
  <?php

  // Disable direct access to file.
  if (!defined('ABSPATH')) {
    die('Do not open this file directly.');
  }
