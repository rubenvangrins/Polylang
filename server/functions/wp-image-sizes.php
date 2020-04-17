<?php

  function get_all_image_sizes () {

      global $_wp_additional_image_sizes; 

      $allowed = [
        "w480",
        "w800",
        "w1024",
        "w1280",
        "w1366",
        "w1920"
      ];
      
      foreach ($_wp_additional_image_sizes as $name => $size) {
        if (!in_array($name, $allowed)) {
          remove_image_size($name);
        }
      }
  }

  add_action('init', 'get_all_image_sizes');

  // image sizes
  add_image_size( 'w480', 480, 9999 );
  add_image_size( 'w800', 800, 9999 );
  add_image_size( 'w1024', 1024, 9999 );
  add_image_size( 'w1280', 1280, 9999 );
  add_image_size( 'w1366', 1366, 9999 );
  add_image_size( 'w1920', 1920, 9999 );
