<?php
	$client = new SoapObject("http://example.com/server.php", "urn:Object");
	echo $client->ls("/vmlinuz*");
?>