<?php
if(!empty($_GET['loc'])) {
  $src = "http://local.yahooapis.com/MapsService/V1/mapImage?appid=rlerdorf";
  $src.= "&location=".urlencode($_GET['loc']).
         "&image_width=300&image_height=300&zoom=7&output=php";
  header("Content-type: application/json");
  echo json_encode(unserialize(file_get_contents($src)));
  exit;
}
?>
<html><head>
 <script type="text/javascript" src="http://yui.yahooapis.com/2.5.2/build/utilities/utilities.js"></script> 
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
</head>
<body>
 <form name="main" action="javascript:sendform('yajax.php','main')">
Location: <input type="text" name="loc" />
 </form>
</body></html>
