<?php
if(!empty($_REQUEST['loc'])) {
  $src = 'http://api.local.yahoo.com/MapsService/V1/geocode?appid=rlerdorf'.
         '&location='.urlencode($_REQUEST['loc']).'&output=php';
  header("Content-type: application/x-json");
  echo json_encode(unserialize(file_get_contents($src)));
  exit;
}
?>
<html><head>
 <script language="javascript" src="/yui/YAHOO.js"></script>
 <script language="javascript" src="/yui/connection.js"></script>
 <script language="javascript">
<!--
var fN = function callBack(o) {
  var resp = eval('(' + o.responseText + ')');
  var latlon = document.getElementById('latlon');
  latlon.innerHTML = "Latitude: <b>"+resp.ResultSet.Result.Latitude+"</b> &nbsp; "+
                     "Longitude: <b>"+resp.ResultSet.Result.Longitude+"</b><br />"+
                     "Precision: <b>"+resp.ResultSet.Result.precision+"</b>";
} 
var callback = { success:fN }
function sendform(target,formName) {
   YAHOO.util.Connect.setForm(formName);
   YAHOO.util.Connect.asyncRequest('POST',target,callback);
}
// -->
 </script>
</head><body>
 <form name="main" action="javascript:sendform('yajax_geocode.php','main')">
Location: <input type="text" name="loc" />
 </form>
 <div id="latlon">
 </div>
</body></html>
