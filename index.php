<?php
  require_once("config/startup.php");
  
  require_once "clicks_controller.php";
  get_view();

  if ($_SERVER['REQUEST_METHOD'] === 'HEAD' && isset($_REQUEST['clicked'])) {
    new_visitor();
  }