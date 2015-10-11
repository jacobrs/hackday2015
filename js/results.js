window.sum = 0;

$(document).ready(function(){
  $.ajax({
		type: "POST",
		url: "../api/fetch.php?survey="+surveyID,
		dataType: "json",
		success: function(data){
      window.results = data;
      getSum();
      showPercentages();
    }
  });
});

function showPercentages(){
  window.colors = ["color1", "color2", "color3", "color4", "color5", "color6"];
  $("#battlebar").empty();
  var out = "";
  var total = 0;
  for(var i = 0; i < window.options.length; i++){
    var per = (window.sum != 0)?(window.results[window.options[i]] / window.sum) * 100:0;
    total += per;
    out += '<div class="progress-bar" id="'+getMeAColor()+'" style="width: '+per+'%">'+window.options[i]+'</div>';
  }
  if(total == 0){
    out += '<div class="progress-bar progress-bar-danger" style="width: 100%">Nothing Found :(</div>';
  }
  $("#battlebar").html(out);
}

function getMeAColor(){
  var color = window.colors[window.colors.length - 1];
  window.colors.pop();
  return color;
}

function getSum(){
  window.sum = 0;
  for(var i = 0; i < window.options.length; i++){
    window.sum += window.results[window.options[i]];
  }
}
