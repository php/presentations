<?php
$key = 'Welcome to the monkey house'
$s   = 'cc-number-goes-here';
$alg = MCRYPT_BLOWFISH;
$mode = MCRYPT_MODE_CBC;

$iv = mcrypt_create_iv(
	mcrypt_get_iv_size($alg, $mode), 
	MCRYPT_DEV_URANDOM
);
$data = mcrypt_encrypt($alg, $key, $s,  $mode, $iv);

mysql_query(
	sprintf("INSERT INTO customers (iv, data) ('%s', '%s')", 
		mysql_escape_string($iv), mysql_escape_string($data)
	), 
	$dbh
);
?> 
