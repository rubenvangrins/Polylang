<?php

  // Remove the gutenberg features
  add_filter( 'allowed_block_types', 'misha_allowed_block_types' );

  // disable for posts
  add_filter('use_block_editor_for_post', '__return_false', 10);

  // disable for post types
  add_filter('use_block_editor_for_post_type', '__return_false', 10);

  function misha_allowed_block_types( $allowed_blocks ) {

    // Remove these features
    return array(
    	// 'core/image',
    	// 'core/paragraph',
    	// 'core/heading',
    	// 'core/list',
      // 'core/subhead',
      // 'core/gallery',
      // 'core/quote',
      // 'core/audio',
      // 'core/cover-image',
      // 'core/file',
      // 'core/video',
      // 'core/table',
      // 'core/verse',
      // 'core/code',
      // 'core/freeform',
      // 'core/html',
      // 'core/preformatted',
      // 'core/pullquote',
      // 'core/button',
      // 'core/text-columns',
      // 'core/more',
      // 'core/nextpage',
      // 'core/seperator',
      // 'core/spacer',
      // 'core/shortcode',
      // 'core/archives',
      // 'core/categories',
      // 'core/latest-comments',
      // 'core/latest-posts',
      // 'core/embed',
      // 'core-embed/twitter',
      // 'core-embed/youtube',
      // 'core-embed/facebook',
      // 'core-embed/instagram',
      // 'core-embed/wordpress',
      // 'core-embed/soundcloud',
      // 'core-embed/spotify',
      // 'core-embed/flickr',
      // 'core-embed/vimeo',
      // 'core-embed/animoto',
      // 'core-embed/cloudup',
      // 'core-embed/collegehumor',
      // 'core-embed/dailymotion',
      // 'core-embed/funnyordie',
      // 'core-embed/hulu',
      // 'core-embed/imgur',
      // 'core-embed/issuu',
      // 'core-embed/kickstarter',
      // 'core-embed/meetup-com',
      // 'core-embed/mixcloud',
      // 'core-embed/photobucket',
      // 'core-embed/polldaddy',
      // 'core-embed/reddit',
      // 'core-embed/reverbnation',
      // 'core-embed/screencast',
      // 'core-embed/scribd',
      // 'core-embed/slideshare',
      // 'core-embed/smugmug',
      // 'core-embed/speaker',
      // 'core-embed/ted',
      // 'core-embed/tumblr',
      // 'core-embed/videopress',
      // 'core-embed/wordpress-tv'
    );

  }

?>
