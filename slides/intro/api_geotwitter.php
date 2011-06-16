<?php
if(empty($_GET['lat'])):?>
<script type="text/javascript" src="/jquery.min.js"></script>
<script type="text/javascript"
         src="http://maps.google.com/maps/api/js?sensor=false">
</script>
<div id="map" style="width: 600px; height: 480px;"></div>
<div id="tweets"></div>
<script>
$(document).ready(function() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition (
      function(position) {
        var target = "/presentations/slides/intro/api_geotwitter.php";
        var lat = position.coords.latitude;
        var lng = position.coords.longitude;
        var gop = { zoom: 15, center: new google.maps.LatLng(lat, lng),
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    scaleControl: true };
        var map = new google.maps.Map(document.getElementById("map"),gop);
        $.get(target, {'lat':lat, 'lng':lng},
                      function(responseText){  
                         $("#tweets").html(responseText);  
                      },  "html");
      }
    );
  }
});
</script>
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
