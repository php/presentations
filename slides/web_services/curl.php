<?php
$cc = curl_init();

// Set destination URL
curl_setopt($cc, CURLOPT_URL, "http://example.com/server.php");

// indicate we're making a POST request
curl_setopt($cc, CURLOPT_POST, 1); 

// set content of post request
curl_setopt($cc, CURLOPT_POSTFIELDS, "<xml> ... </xml>"); 

// Set Authentication Parameters
curl_setopt($cc, CURLOPT_USERPWD, 'ilia:aili');

// Indicate we support compression (very handy to large output)
curl_setopt($cc, CURLOPT_ENCODING, 'deflate');

// return output as string
curl_setopt($cc, CURLOPT_RETURNTRANSFER, 1);

// execute request
$response = curl_exec($cc);

// free memory
curl_close($cc);
?>