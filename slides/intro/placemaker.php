<?php
$q = isset($_POST['q']) ? trim($_POST['q']) : '';
if(!strlen($q) && isset($_GET['q'])) $q = trim($_GET['q']);
$type = 'text/plain';
?>
<html><head><title>Placemaker Test</title></head>
<body>
<h3>Paste a blurb of text, or a URL to fetch text from (Max 50KB)</h3>
<form action="placemaker.php" method="POST">
<textarea name="q" cols=100 rows=10><?php echo htmlspecialchars($q)?></textarea><br><br>
<input type="submit">
</form>
<?php
if(strlen($q)) {
  if(substr(strtolower($q),0,4)=='http') {
    // If we have a URL, send a HEAD request to pick up the content-type
    $opts = array('http'=>array('method'=>"HEAD"));
    $context = stream_context_create($opts);
    $tmp = file_get_contents($q,false,$context);
    foreach($http_response_header as $v) {
      list($key,$value) = explode(':',$v);
      if(strtolower(trim($key))=='content-type') {
        list($tmp,$junk) = explode(';',$value,2);
        $type = trim($tmp);
      }
    }
    $find = 'documentURL='.$q;
  } else {
    $find = 'documentContent='.rawurlencode($q);
  }
  file_put_contents("/var/tmp/pl.log",$q."\n", FILE_APPEND);  // Logging queries
  $url = 'http://wherein.yahooapis.com/v1/document';
  $post = "appid=Gux4Z8LIkY1IKfVXnRcMegs3IjNfmUhl&documentType=$type&$find";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
  $data = curl_exec($ch);
  curl_close($ch);
  $xml = new DOMDocument;
  $xml->preserveWhiteSpace = false;
  $xml->loadXML($data);
  $xml->formatOutput = true;  // Make the XML look pretty
  $data = $xml->saveXML();
  $tmpf = tempnam('/var/tmp','pl');
  file_put_contents($tmpf,$data);
  echo "<pre>";
  echo `/usr/local/bin/code2html --no-header -lhtml -t 4 $tmpf`; // Syntax highlighting
  echo "</pre>";
  unlink($tmpf);
}
?>
</body>
</html>
