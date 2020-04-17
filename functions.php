<?php
  // Set locale
  setlocale(LC_TIME, 'NL_nl');
  setlocale(LC_ALL, 'nl_NL');

  // Set timezone
  // date_default_timezone_set("Europe/Amsterdam");

  // Set the directory for all function files
  $dir["fnc"] = __DIR__ . "/server/functions/*.{php}";
  $dir["cpt"] = __DIR__ . "/server/post-types/*.{php}";

  // Get files
  foreach ($dir as $d) {
    // Get files
    $files = glob($d, GLOB_BRACE);

    // Loop and check if file exists, if exist => require
    if (count($files) !== 0) {
      foreach ($files as $f) {
        require_once($f);
      }
    }
  }
