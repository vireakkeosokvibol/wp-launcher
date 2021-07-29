<?php get_header(); ?>
<div class="uk-container">
  <h1><?php the_title(); ?></h1>
  <div>
    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
    <?php the_content(); ?>
    <?php endwhile; endif; ?>
  </div>
</div>
<?php get_footer(); ?>
<?php

// Disable direct access to file.
if (!defined('ABSPATH')) {
  die('Do not open this file directly.');
}
