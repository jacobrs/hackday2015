<?php
  header("Content-type: application/json");

  global $hashtagRegex;
  $hashtagRegex = "/^[a-zA-Z0-9]*$/";

  if(isset($_POST["title"]) && isset($_POST["options"]) &&
    strlen($_POST["title"]) > 1 &&
    areHashtags($_POST["title"], $_POST["options"])){

    // include the connection to the database
    require_once("../config/connect.php");
    require_once("../classes/option.php");
    require_once("../classes/survey.php");
    global $db;

    if(validateOptions($_POST["options"]) && preg_match($hashtagRegex, substr($_POST["title"], 1))){
      Survey::insertSurvey($_POST["title"], $_POST["options"]);
        $return = ["success" => "inserted survey"];
        echo json_encode($return);
    }else{
      $return = ["error" => "invalid parameters"];
      echo json_encode($return);
    }

    // finish db interaction
    $db->close();

  }else{
    $return = ["error" => "missing or invalid parameters"];
    echo json_encode($return);
    exit;
  }

  function validateOptions($opts){
    global $hashtagRegex;
    $valid = true;
    foreach($opts as $o){
      $valid = $valid && preg_match($hashtagRegex, substr($o, 1));
    }
    return $valid;
  }

  function areHashtags($title, $opts){
    global $hashtagRegex;
    $valid = substr($title, 0, 1) == "#";
    foreach($opts as $o){
      $valid = $valid && strlen($o) > 1 && substr($o, 0, 1) == "#";
    }
    return $valid;
  }

?>
