<?php
if(empty($_GET['lat'])):?>
<script type="text/javascript" src="/jquery.min.js"></script>
<script>
$(document).ready(function() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition (
      function(position) {
        console.log(position);
        var target = "/presentations/slides/intro/api_geotwitter.php";
        $.get(target, {'lat':position.coords.latitude,
                       'lng':position.coords.longitude},
                      function(responseText){  
                         $("#tweets").html(responseText);  
                      },  "html");
      }
    );
  }
});
</script>
<div id="tweets">
</div>
<?php
else:
$lat  = (double)$_GET['lat'];
$lng  = (double)$_GET['lng'];

$tws  = 'http://search.twitter.com/search.json';
$json = file_get_contents("$tws?geocode=$lat%2C$lng%2C1km&rpp=50");
$data = json_decode($json);

$twpr = 'http://api.twitter.com/1/users/profile_image';

foreach($data->results as $tweet):
$dt = date('r',strtotime($tweet->created_at));
echo <<<EOT
<img src="$twpr/{$tweet->from_user}?size=normal" style="float:left;"/>
&nbsp;<b>{$tweet->from_user}</b> &nbsp; $dt<br />
&nbsp;{$tweet->text}<br clear="left"/>
<br />
EOT;
endforeach;
endif;
