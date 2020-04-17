<?php

  // save json file to custom dir
  add_filter('acf/settings/save_json', 'my_acf_json_save_point');

  function my_acf_json_save_point($path) {
    // update path
    $path = get_stylesheet_directory() . '/server/acf';
    return $path;
  }

  function array_to_object ($value) {

    // run the_content filter on all textarea values
    $value = json_decode(json_encode($value));
    return $value;
    
  }

  add_filter('acf/format_value', 'array_to_object', 10, 3);

  // if (is_admin() === true) {
  //   echo "<style>.wysiwyg--small iframe {height: 200px !important}</style>";
  // }

  add_action('acf/render_field_settings/type=text', 'add_readonly_and_disabled_to_text_field');

  function add_readonly_and_disabled_to_text_field($field) {

    acf_render_field_setting( $field, array(
      'label'      => __('Read Only?','acf'),
      'instructions'  => '',
      'type'      => 'radio',
      'name'      => 'readonly',
      'choices'    => array(
        1        => __("Yes",'acf'),
        0        => __("No",'acf'),
      ),
      'layout'  =>  'horizontal',
    ));

    acf_render_field_setting( $field, array(
      'label'      => __('Disabled?','acf'),
      'instructions'  => '',
      'type'      => 'radio',
      'name'      => 'disabled',
      'choices'    => array(
        1        => __("Yes",'acf'),
        0        => __("No",'acf'),
      ),
      'layout'  =>  'horizontal',
    ));
    
  }