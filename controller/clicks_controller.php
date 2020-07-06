
<?php
  require_once "utils/mobile_detect.php";
  require_once "clicks_model.php";

  function new_visitor() {
    $ip = $_SERVER['REMOTE_ADDR'];
    $client = $_SERVER['HTTP_USER_AGENT'];
    $detect = new Mobile_Detect();
    $device_type = $detect->isTablet() ? "table" : $detect->isMobile() ? "mobile" : "desktop";
    insert_new_click($ip, $client, $device_type); 
  }

  function get_view() {
    $content = "img_view.php";
    $file_contents = file_get_contents($GLOBALS['config']['img_map']);
    $imgs_arr = explode(',', $file_contents);
    require_once "layouts/main_layout.php";
  }