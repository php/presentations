<?php
// generate request
$request = xmlrpc_encode_request("ls", 
		array("-1", "--color=no", "/usr/src/"));

// we encode the request to make it safe to pass via GET
$request = base64_encode($request);

$url = str_replace('show.php/webservices_2004/34', '/presentations/slides/web_services/xmlrpc_server.php', $_SERVER['PHP_SELF']); 

// we now need to submit the request to the server
$response = file_get_contents(
	"http://{$_SERVER['HTTP_HOST']}{$url}?query={$request}"
);

// decode XML response into something PHP can understand
$response = xmlrpc_decode($response);

echo nl2br($response);
?>