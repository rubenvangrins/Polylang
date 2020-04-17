<?php
  // ACF - WYSIWYG editors
  function my_toolbars($toolbars) {

    $toolbars['Minimal'] = array();
    $toolbars['Minimal'][1] = array(
      'formatselect',
      'bold',
      'italic',
      // 'underline',
      'bullist',
      'numlist',
      'link',
      'unlink'
    );

    $toolbars['Clean'] = array();
    $toolbars['Clean'][1] = array(
      // 'formatselect',
      'bold',
      'italic',
      // 'underline',
      'bullist',
      'numlist',
      'link',
      'unlink'
    );

    $toolbars['Custom'] = array();
    $toolbars['Custom'][1] = array(
      'formatselect',
      'bold',
      'italic',
      'strikethrough',
      'underline',
      'bullist',
      'numlist',
      'superscript',
      'indent',
      'link',
      'unlink'
    );

    if(($key = array_search('code', $toolbars['Full'][2])) !== false) {
      unset($toolbars['Full'][2][$key]);
    }

    return $toolbars;
  }

  add_filter('acf/fields/wysiwyg/toolbars', 'my_toolbars');


  // remove headings wysiwyg
  function remove_wysiwyg_text_styles($args) {
    $args['block_formats'] = 'Paragraph=p;Heading 3=h3;';
    return $args;
  }

  add_filter('tiny_mce_before_init', 'remove_wysiwyg_text_styles');


  // paste plain text
  function ag_tinymce_paste_as_text($init) {
  	$init['paste_as_text'] = true;

  	return $init;
  }

  add_filter('tiny_mce_before_init', 'ag_tinymce_paste_as_text');

  /* function my_acf_add_local_field_groups() {
    remove_filter('acf_the_content', 'wpautop' );
  }
  add_action('acf/init', 'my_acf_add_local_field_groups'); */

?>
