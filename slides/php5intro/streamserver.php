<?php
$s = stream_socket_server('tcp://localhost:8080');
while ($client = stream_socket_accept($s)) {
	$line = fgets($client);
	echo $line;
}
?>
