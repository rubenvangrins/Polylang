<?php

  // disable wp admin nav items
  function remove_menus() {
    remove_menu_page('index.php'); // dashboard
    // remove_menu_page('edit.php'); // posts
    remove_menu_page('edit-comments.php'); // comments
    // remove_menu_page('plugins.php'); // plugins
    //remove_menu_page('users.php'); // users
    // remove_menu_page('tools.php'); // tools
    //remove_menu_page('options-general.php'); // settings
  }

  // add_action('admin_menu', 'remove_menus');

  // disable wp admin nav items
  function remove_by_default() {
    remove_menu_page('index.php'); // dashboard
    // remove_menu_page('edit.php'); // posts
    remove_menu_page('edit-comments.php'); // comments
    // remove_menu_page('plugins.php'); // plugins
    //remove_menu_page('users.php'); // users
    // remove_menu_page('tools.php'); // tools
    //remove_menu_page('options-general.php'); // settings
  }

  add_action('admin_menu', 'remove_by_default');

  // add_filter('acf/settings/show_admin', '__return_false'); // ACF
