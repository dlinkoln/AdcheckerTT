<?php

  function insert_new_click($ip, $user_agent, $device_type) {
    $sql1 = "INSERT INTO visitors (`ip`, `user_agent`, `device_type`) VALUES ('{$ip}', '{$user_agent}', '{$device_type}') ON DUPLICATE KEY UPDATE is_new=FALSE;";
    $sql2 = "INSERT INTO clicks (`visitor_id`) values ('{$ip}')";
    //var_dump($sql2);
    return DB::transact(array($sql1, $sql2));
  }