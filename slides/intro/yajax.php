<?php
if(!empty($_GET['loc'])) {
  $src = "http://api.local.yahoo.com/MapsService/V1/mapImage?appid=rlerdorf";
  $src.= "&location=".urlencode($_GET['loc']).
         "&output=php&image_width=300&image_height=300&zoom=7";
  header("Content-type: application/json");
  echo json_encode(unserialize(file_get_contents($src)));
  exit;
}
?>
<html><head>
 <script language="javascript" src="/yui/YAHOO.js"></script>
 <script language="javascript" src="/yui/connection.js"></script>
 <script language="javascript">
var fN = function callBack(o) {
  var resp = eval('(' + o.responseText + ')');
  img = document.createElement('img'); 
  img.src = resp.Result; img.width=300; img.height=300; img.border=1;
  document.body.appendChild(img);
} 
var callback = { success:fN }
function sendform(target,formName) {
   YAHOO.util.Connect.setForm(formName);
   YAHOO.util.Connect.asyncRequest('GET',target,callback);
}
 </script>
</head><body>
 <form name="main" action="javascript:sendform('yajax.php','main')">
Location: <input type="text" name="loc" />
 </form>
</body></html>
