<?php
chdir(dirname(__FILE__)); // pres2 hack

// sample IP
$_SERVER['REMOTE_ADDR'] = "24.100.195.79";

$ip_int = sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));

try {
	$db = new sqlite_db("./ip.db");
} catch (sqlite_exception $err) {
	die($err->getMessage() . " in " . $err->getFile() . ":" . $err->getLine());
}

$res = $db->unbuffered_query("
SELECT country_name 
FROM ip_ranges ir 
INNER JOIN country_data cd ON ir.country_code=cd.id
WHERE {$ip_int} BETWEEN ip_start AND ip_end");

echo "User is located in ".$res->fetch_single();
?>