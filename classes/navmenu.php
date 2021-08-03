<?php

// Disable direct access to file.
if (!defined('ABSPATH')) {
  die('Do not open this file directly.');
}

class WP_LAUNCHER_NAVMENU
{

  private $menu_name = '';

  function __construct($menu_name)
  {
    $this->menu_name = $menu_name;
    $this->display();
  }

  private function display()
  {
    $menu_objs = wp_launcher_get_menu($this->menu_name);
    foreach ($menu_objs as $item) {
      if ($item->menu_item_parent == 0) {
        $has_children = false;
        foreach ($menu_objs as $index => $subitem) {
          if ($item->ID == $subitem->menu_item_parent) {
            if ($has_children === false) {
              $has_children = true;
              echo '<li class="nav-item dropdown"><a href="" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">' . $item->title . '</a><ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">';
            }
            echo '<li><a href="" class="dropdown-item">' . $subitem->title .'</a></li>';
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
}
