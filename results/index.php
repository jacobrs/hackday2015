<?php
  $valid = false;
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
      $valid = true;
    }
  }
  if($valid){
    $message = $survey->name."? Tweet ";
    foreach($survey->options as $o){
      $message .= $o->name." ";
    }
    $message = urlencode($message);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Results</title>

    <!-- Bootstrap -->
    <link href="../libs/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/results.css" rel="stylesheet">

    <script type="text/javascript">
      window.options = [];
      <?php
        for($i = 0; $i < count($survey->options); $i++){
          echo "window.options[".$i."] = '".$survey->options[$i]->name."';";
        }
      ?>
      var surveyID = "<?=$survey->id?>";
    </script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="">
            <b style="color: #FFFFFF">#Surveys results for <?=$survey->name?></b>
          </a>
        </div>
      </div>
    </nav>
    <h1 id="title">Here's what Twitter has to say about <?=$survey->name?></h1>

    <h4 id="battlebar-title">The BattleBar</h4>
    <div class="progress" id="battlebar">
      <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100"
        aria-valuemin="0" aria-valuemax="100" style="width: 100%">
        <span class="sr-only"></span>
      </div>
    </div>

    <a id="tweet-btn" class="twitter-share-button"
      href="https://twitter.com/intent/tweet?text=<?=$message?>"
      data-size="large">
    Share Results</a>

    <script>
      !function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location)?'http':'https';
        if(!d.getElementById(id)) {
          js = d.createElement(s);
          js.id = id;
          js.src = p + '://platform.twitter.com/widgets.js';
          fjs.parentNode.insertBefore(js, fjs);
        }
      }(document, 'script', 'twitter-wjs');
    </script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../libs/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <script src="../js/results.js"></script>
  </body>
</html>
<?php } else { ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Results</title>

    <!-- Bootstrap -->
    <link href="../libs/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/results.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="">
            <b style="color: #FFFFFF">#Surveys</b>
          </a>
        </div>
      </div>
    </nav>
    <h1 id="title">Survey not found :(</h1>
    <a href="../">
      <h3 id="linkHome">Make a Survey!</h3>
    </a>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../libs/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
  </body>
</html>
<?php } ?>
