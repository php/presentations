<?php
// generate request
$request = xmlrpc_encode_request("ls", array("-1", "--color=no", dirname(__FILE__)));

// we encode the request to make it safe to pass via GET
$request = base64_encode($request);

// pres2 hackery
$url = preg_replace("!.*/presentations/!", "/presentations/", __FILE__);
$url = str_replace('xmlrpc_client.php', 'xmlrpc_server.php', $url);

// we now need to submit the request to the server
$response = file_get_contents("http://{$_SERVER['HTTP_HOST']}{$url}?query={$request}");

// decode XML response into something PHP can understand
$response = xmlrpc_decode($response);

echo nl2br($response);
?>