<?php
  global $token;
  header("Content-type: application/json");

  $integerRegex = "/^[0-9]*$/";
  if(isset($_GET["survey"]) && strlen($_GET["survey"]) > 0
    && preg_match($integerRegex, $_GET["survey"])){

    // include the connection to the database
    require_once("../config/connect.php");
    require_once("../classes/option.php");
    require_once("../classes/survey.php");
    require_once("../config/keys.php");
    global $db;

    $survey = new Survey($_GET["survey"]);
    if($survey->name !== null){
      echo json_encode(fetchFromAPI($survey));
    }else{
      $return = ["error" => "survey not found"];
      echo json_encode($return);
    }

    $db->close();

  }else{
    $return = ["error" => "missing or invalid survey id"];
    echo json_encode($return);
    exit;
  }

  function fetchFromAPI($survey){
    $stats = array();
    global $token;
    global $twitter_consumer;
    global $twitter_secret;

    $bearer = base64_encode($twitter_consumer.":".$twitter_secret);

    // create curl resource
    $ch = curl_init();

    $body = "grant_type=client_credentials";

    // set url
    curl_setopt($ch, CURLOPT_URL, "https://api.twitter.com/oauth2/token");

    //return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Host: api.twitter.com', 'POST /oauth2/token HTTP/1.1',
      'Content-type: application/x-www-form-urlencoded;charset=UTF-8', 'Authorization: Basic '.$bearer));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);

    // $output contains the output string
    $output = curl_exec($ch);
    $obj = json_decode($output);
    $token = $obj->access_token;

    // close curl resource to free up system resources
    curl_close($ch);

    foreach($survey->options as $o){
      $opt = urlencode($o->name);
      $e = curl_init();
      curl_setopt($e, CURLOPT_URL, "https://api.twitter.com/1.1/search/tweets.json?include_entities=false&q=".urlencode($survey->name).$opt."&count=100");
      curl_setopt($e, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($e, CURLOPT_HTTPHEADER, array('Host: api.twitter.com', 'GET /search/tweets HTTP/1.1',
        'Content-type: application/x-www-form-urlencoded;charset=UTF-8', 'Authorization: Bearer '.$token));
      $output = curl_exec($e);
      $results = json_decode($output);

      $stats[$o->name] = count($results->statuses);

      curl_close($e);
    }

    return $stats;
  }

?>
