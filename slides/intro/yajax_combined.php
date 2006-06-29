<?php
if(!empty($_GET['loc'])) {
  $geo = 'http://api.local.yahoo.com/MapsService/V1/geocode?appid=YahooDemo'.
         '&location='.urlencode($_GET['loc']).'&output=php';
  $ll = unserialize(file_get_contents($geo));
  $lat = $ll['ResultSet']['Result']['Latitude']; 
  $lon = $ll['ResultSet']['Result']['Longitude']; 
  $map = "http://api.local.yahoo.com/MapsService/V1/mapImage?appid=YahooDemo".
         "&output=php&image_width=450&image_height=450&radius=1500";
  $N = unserialize(file_get_contents("$map&latitude=$lat&longitude=$lon")); 
  $lat = -$lat; $lon = $lon<0 ? 180+$lon : $lon-180;
  $S = unserialize(file_get_contents("$map&latitude=$lat&longitude=$lon")); 
  header("Content-type: application/x-json");
  echo json_encode(array('north'=>$N['Result'],'south'=>$S['Result'],'lon'=>$lon));
  exit;
}
?>
<html><head>
 <script language="javascript" src="/yui/YAHOO.js"></script>
 <script language="javascript" src="/yui/connection.js"></script>
 <script language="javascript">
<!--
var img1 = false;
var img2 = false;
var fN = function callBack(o) {
  var resp = eval('(' + o.responseText + ')');
  if(!img1) {
    img1 = document.createElement('img'); 
    img1.src = resp.north; img1.width=450; img2.height=450; img2.border=1;
    document.body.appendChild(img1);
  } else img1.src = resp.north;
  if(!img2) {
    img2 = document.createElement('img'); 
    img2.src = resp.south; img2.width=450; img2.height=450; img2.border=1;
    document.body.appendChild(img2);
  } else img2.src = resp.south;
} 
var callback = { success:fN }
function sendform(target,formName) {
   YAHOO.util.Connect.setForm(formName);
   YAHOO.util.Connect.asyncRequest('GET',target,callback);
}
// -->
 </script>
</head><body>
 <form name="main" action="javascript:sendform('yajax_combined.php','main')">
Location: <input type="text" name="loc" />
 </form>
 <div id="result"></div>
</body></html>
