<?php
$user = "/usr/local; rm -f /";
$command = "ls -l ";

var_dump(
	escapeshellcmd($command . $user)
);

var_dump(
	$command . escapeshellarg($user)
);
?>
