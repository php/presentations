<?php
/* bind to port 11111 on local machine */
$sock = stream_socket_server('tcp://localhost:11111');
/* wait for user input */
while ($conn = stream_socket_accept($sock)) {
	$line = trim(fgets($conn)); // read user input
	fwrite($conn, "You wrote '$line'\n"); // print response
}
?>
