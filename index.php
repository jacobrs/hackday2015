<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>#Surveys</title>

    <!-- Bootstrap -->
    <link href="libs/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/inputs.css" rel="stylesheet">

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
            <b id="logo">#Surveys</b>
          </a>
        </div>
      </div>
    </nav>
    <div id="header">
      <h1>Make a twitter survey</h1>
    </div>
    <form method="POST" action="api/save.php" id="survey_form">
      <div class="input-group">
        <span class="input-group-addon">#</span>
        <input type="text" class="form-control" name="title" placeholder="Survey name">
      </div>
      <div class="input-group">
        <span class="input-group-addon">#</span>
        <input type="text" class="form-control" id="option1" name="options[0]" placeholder="Enter option">
        <span class="input-group-btn">
          <button class="btn btn-default addButton" id="add_button" type="button">+</button>
        </span>
      </div>
      <div class="input-group hide" id="option_template">
        <span class="input-group-addon">#</span>
        <input type="text" class="form-control" id="option2" placeholder="Enter option">
        <span class="input-group-btn">
          <button class="btn btn-default removeButton" id="remove_button" type="button">-</button>
        </span>
      </div>
      <div id="tweet_button">
        <script>
          var url_string = title;
          url_string += "&";
          for(var i = 0; i <= options.length - 1; i++) {
            url_string += options[i];
            if(i < options.length)
              url_string += "&";
          }
          console.log(url_string);
        </script>
        
        <a href="https://twitter.com/intent/tweet" class="twitter-hashtag-button" id="tweet" data-size="large" data-related="georgeisking">Tweet #Surveys</a>
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
      </div>
    </form>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="libs/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <script src="js/input-add-remove.js"></script>
  </body>
</html>
