<?php

  // Register custom menu
  function site_menus() {
      register_nav_menus(
        [
          'header'     => __( 'Header' )
        ]
      );
  }
  add_action( 'init', 'site_menus' );

  // Menus function
  function get_menu_by_location ($location)  {
    if (empty($location) !== true) {
    	$menuName  = $location;
    	$locations = get_nav_menu_locations();
    	$menuId    = $locations[$menuName];
      $menu      = wp_get_nav_menu_object($menuId);
      if (is_object($menu) === true && empty($menu) === false) {
        $items = wp_get_nav_menu_items($menu->name);
        return $items;
      }
    }
  }
