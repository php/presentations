<?php
$user = "/usr/local; rm -f /";
$command = "ls -l ";

var_dump(
	escapeshellcmd($command . $user)
);

print "\n<br />\n";

var_dump(
	$command . escapeshellarg($user)
);
?>
