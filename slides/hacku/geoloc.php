<?php
  if(isset($_GET['lat'])) {
    $url = 'http://gws.maps.yahoo.com/FindLocation';
    $lat = (float)$_GET['lat']; $lon = (float)$_GET['lon'];

    $data = file_get_contents($url."?q=$lat,$lon&flags=QT&gflags=R");
    // Make the XML look pretty
    $xml = new DOMDocument;
    $xml->preserveWhiteSpace = false;
    $xml->loadXML($data);
    $xml->formatOutput = true;
    $data = $xml->saveXML();
    echo "<pre>".htmlspecialchars($data)."</pre>";
    exit;
  }
?>
<html><head>
<title>GeoLocation Example</title>
<script type="text/javascript" 
         src="http://yui.yahooapis.com/2.5.2/build/utilities/utilities.js"></script>
<script type="text/javascript"
        src="http://api.maps.yahoo.com/ajaxymap?v=3.8&appid=rlerdorf"></script>
<script langugage="javascript">
var geoloc = function() {
  var jsmap = new YMap('jsmapContainer');
  jsmap.addZoomLong();
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      function(position) { 
        var loc = new YGeoPoint(position.coords.latitude,position.coords.longitude);
        var Pin = new YImage();
        Pin.src = 'http://www.lerdorf.com/red_pin.png';
        Pin.size = new YSize(32,27);
        Pin.offset = new YCoordPoint(1,4);
        jsmap.drawZoomAndCenter(loc, 2);
        jsmap.addOverlay(new YMarker(loc, Pin));
        sendLL(position.coords.latitude,position.coords.longitude);
      },
      function(error) {
        alert("Error: " + error);
      }
    );
  } else {
    alert("This example only works in browsers that support geolocation");
  }
}
var fN = function callBack(o) {
  var place_data = document.getElementById('place_data');
  place_data.innerHTML = o.responseText;
} 

var callback = { success:fN }

function sendLL(lat,lon) {
  var target = '/presentations/slides/hacku/geoloc.php';
  YAHOO.util.Connect.asyncRequest('GET',target+'?lat='+lat+'&lon='+lon,callback);
}
YAHOO.util.Event.addListener(window, "load", geoloc);
</script>
</head>
<body>
<div id="jsmapContainer" style="height: 500px; width: 930px;"></div>
<div id="place_data"></div>
</body></html>
