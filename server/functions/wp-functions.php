<?php

  // Sanitize
  function sanitize ($string) {
    if (empty($string) === false) {
      // Escape
      $return = esc_html($string);
      $return = esc_sql($return);
      $return = esc_js($return);
      // Sanitize
      $return = sanitize_text_field($return);
      // $return = sanitize_title_for_query($return);

      return $return;
    }
  }

  // Detect IE
  function detect_ie () {

    $arr_browsers = ["Firefox", "Chrome", "Safari", "Opera", "MSIE", "Trident", "Edge"];
    $agent = $_SERVER['HTTP_USER_AGENT'];

    $user_browser = '';
    foreach ($arr_browsers as $browser) {
      if (strpos($agent, $browser) !== false) {
        $user_browser = $browser;
        break;
      }
    }

    switch ($user_browser) {
      case 'MSIE':
        $user_browser = 'Internet Explorer';
        break;

      case 'Trident':
        $user_browser = 'Internet Explorer';
        break;

      // case 'Edge':
      //   $user_browser = 'Internet Explorer';
      //   break;
    }

    if ($user_browser === 'Internet Explorer') return true; else return false;
  }

  function return_browser () {

    $arr_browsers = ["Firefox", "Chrome", "Safari", "Opera", "MSIE", "Trident", "Edge"];
    $agent = $_SERVER['HTTP_USER_AGENT'];

    $user_browser = '';
    foreach ($arr_browsers as $browser) {
      if (strpos($agent, $browser) !== false) {
        $user_browser = $browser;
        break;
      }
    }

    switch ($user_browser) {
      case 'MSIE':
        $user_browser = 'Internet Explorer';
        break;

      case 'Trident':
        $user_browser = 'Internet Explorer';
        break;

      // case 'Edge':
      //   $user_browser = 'Internet Explorer';
      //   break;
    }

    return $user_browser;

  }

  // Debug function
  function debug ($var) {
    if ($var) {
      echo "<pre>";
      var_dump($var);
      echo "</pre>";
    }
  }

  // Include svg
  function svgInclude (string $url) {
    // check if url is given
    if (filter_var($url, FILTER_SANITIZE_URL) !== false) {
      // string has passed the filter
      $file = explode("/", $url);
      $file = array_reverse($file);
      $dir  = wp_upload_dir()["basedir"] . "/";
      $full = $dir . $file[2] . "/" . $file[1] . "/" . $file[0];
      if (file_exists($full) === true) {
        echo file_get_contents($full); // parse file to include it within the page
      }
    }
  }

  // Clean string
  function cleanString (string $string) {
     $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
     $string = str_replace('-', '', $string); // Replaces all spaces with hyphens.
     return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
  }

  // Function to split array
  function splitArray (array $array) {

    // Set variables
    $return = [];
    $len = count($array);

    // Split and return
    $return[] = array_slice($array, 0, $len / 2);
    $return[] = array_slice($array, $len / 2);
    return $return;
  }

  // Array find
  function array_find($needle, array $haystack, $column = null) {
    if(is_array($haystack[0]) === true) { // check for multidimentional array

        foreach (array_column($haystack, $column) as $key => $value) {
            if (strpos(strtolower($value), strtolower($needle)) !== false) {
                return $key;
            }
        }

    } else {
        foreach ($haystack as $key => $value) { // for normal array
            if (strpos(strtolower($value), strtolower($needle)) !== false) {
                return $key;
            }
        }
    }
    return false;
  }

  // Get page id by search
  function get_page_id_by_title_search ($string) {
    global $wpdb;
    $title = esc_sql($string);
    if(!$title) return;
    $page = $wpdb->get_results("
        SELECT ID
        FROM $wpdb->posts
        WHERE post_title LIKE '%$title%'
        AND post_type = 'page'
        AND post_status = 'publish'
        LIMIT 1
    ");

    if (is_array($page) && empty($page[0]) === false) return $page[0]->ID; else return false;
  }

  // Custom functions
  function getSslPage($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
  }