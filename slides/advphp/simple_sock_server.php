<?php
set_time_limit (0);

ob_implicit_flush ();

$address = '127.0.0.1';
$port = 1053;

$sock = socket_create (AF_INET, SOCK_STREAM, 0);
if ($sock < 0) {
	die ('Cannot create a socket');
}

if (socket_bind ($sock, $address, $port) < 0) {
	die ("Cannot bind to address $address on port $port\n");
}

socket_listen ($sock, 10);
while (($csock = socket_accept ($sock)) >= 0) {
	$msg = "Welcome!";

	socket_write ($csock, $msg, strlen ($msg));
	while (true) {
		$buf = socket_read ($csock, 1024);
		if ($buf === false) {
			break 2;
		}

		$buf = trim ($buf);
		if (!$buf) {
			continue;
		}

		switch ($buf) {
		case '/quit':
			break 2;
		case '/shutdown':
			socket_close ($csock);
			break 3;
		default:
			$msg = "You Wrote: $buf\n";
			socket_write ($csock, $msg, strlen ($msg));
			break;
		}
	}

    socket_close ($csock);
}

socket_close ($sock);

/**
 * Local Variables:
 * c-basic-offset: 4
 * tab-width: 4
 * End:
 */
?>