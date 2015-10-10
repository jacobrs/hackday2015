<?php
  header("Content-type: application/json");

  $hashtagRegex = "/^[a-zA-Z0-9]*$/";

  if(isset($_POST["title"]) && isset($_POST["options"])){

    // include the connection to the database
    require_once("../config/connect.php");
    require_once("../classes/option.php");
    require_once("../classes/survey.php");
    global $db;

    // TODO
    // Validate the input params

    Survey::insertSurvey($_POST["title"], $_POST["options"]);

    // finish db interaction
    $db->close();

  }else{
    $return = ["error" => "missing parameters"];
    echo json_encode($return);
    exit;
  }

?>
