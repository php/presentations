<?php
$client = new SoapClient(null, 
	array(
		'location' => "http://127.0.0.1/soap_server.php",
		'uri'      => "http://example.php/"
	)
);
$dir = new SoapParam("/vmlinu*", "dir");
echo nl2br($client->ls($dir));
?>