<?php

  // clean up the head
  remove_action('wp_head', 'feed_links_extra');
  remove_action('wp_head', 'feed_links');
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wlwmanifest_link');
  remove_action('wp_head', 'index_rel_link');
  remove_action('wp_head', 'parent_post_rel_link', 10);
  remove_action('wp_head', 'start_post_rel_link', 10);
  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
  remove_action('wp_head', 'wp_generator');

  // remove emoji's
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('wp_print_styles', 'print_emoji_styles');

  // Custom admin css
  function customAdminCss () {
    echo '
      <style>
        #types-adder,
        #levels-adder {
          display: none;
        }
      </style>
    ';
  }

  add_action('admin_head', 'customAdminCss');