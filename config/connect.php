<?php

  global $db;
  $database = "twitter_surveys";
  $table = "surveys";
  $user = "twitter";
  $password = "hack2015";
  $host = "localhost";

  $db = new mysqli($host, $user, $password, $database);
  if ($db->connect_error) {
    die('Connect Error (' . $db->connect_errno . ') '. $db->connect_error);
  }

?>
