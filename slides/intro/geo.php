<?php
$appid = 'Gux4Z8LIkY1IKfVXnRcMegs3IjNfmUhl';
$url = 'http://where.yahooapis.com/v1/places.q';

if(!empty($_GET['loc'])) {
  $src = "http://where.yahooapis.com/v1/places.q";
  $src.= "(".urlencode($_GET['loc']).');count=0'.
         "?appid=$appid&format=json";
  echo '<pre>'.print_r(json_decode(file_get_contents($src),true),true).'</pre>';
  exit;
}
?>
<html><head>
 <script type="text/javascript" 
         src="http://yui.yahooapis.com/2.5.2/build/utilities/utilities.js">
 </script> 
 <script language="javascript">
  var fN = function callBack(o) {
    var latlon = document.getElementById('output');
    latlon.innerHTML = o.responseText;
  } 

  var callback = { success:fN }

  function sendform(target,formName) {
    YAHOO.util.Connect.setForm(formName);
    YAHOO.util.Connect.asyncRequest('GET',target,callback);
  }
 </script>
</head>
<body>
 <form name="main" action="javascript:sendform('geo.php','main')">
Location: <input type="text" name="loc" />
 </form>
 <div id="output">
 </div>
</body></html>
