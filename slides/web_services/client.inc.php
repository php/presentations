<?php
function send_request($packet)
{
	$length = strlen($packet);
	$fp = fsockopen(__SERVER__, __PORT__);

	// send POST request with the packet
	fwrite($fp, "POST /server.php HTTP/1.0\n");
	fwrite($fp, "Host: " . __SERVER__ . "\n");
	fwrite($fp, "Content-Length: {$length}\n\n");
	fwrite($fp, "{$packet}\n");

	// get server response
	$data = '';
	while (($line = fread($fp, 10000))) {
		$data .= $line;
	}
	
	// terminate connection to server
	fclose($fp);

	return $data;
}

function make_request()
{
	$user = $_GET['login'];
	$password = md5($_GET['password']);
	
	$packet_id = wddx_packet_start("Authentication Request");
	wddx_add_vars($packet_id, 'user', 'password');
	$packet = wddx_packet_end($packet_id);

	// make a custom POST request to the server with the wddx packet
	return send_request($packet);
}	

function parse_response($data)
{
	// skip HTTP header
	$data = ltrim(strstr($data, "\r\n\r\n"));

	$vars = wddx_deserialize($data);
	if ($vars['login'] === TRUE) {
		return TRUE;
	} else { // uh oh, hackers
		printf("ERROR #%d: %s<br />\n", $vars['error'], $vars['error_str']);
		return FALSE;
	}
}
?>