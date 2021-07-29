<!DOCTYPE html>
<html lang="en">

<head>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">
      <?php if (count(get_menu('header-menu')) > 0) : ?>
        <?php foreach(get_menu('header-menu') as $item) : ?>
          <ul class="uk-navbar-nav"><li><a href="/"><?php echo $item->title; ?></a></li></ul>
        <?php endforeach; ?>
      <?php else: ?>
        <ul class="uk-navbar-nav"><li><a href="/">Home</a></li></ul>
      <?php endif; ?>
    </div>
  </nav>

  <?php

  // Disable direct access to file.
  if (!defined('ABSPATH')) {
    die('Do not open this file directly.');
  }
