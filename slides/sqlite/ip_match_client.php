<?php
chdir(dirname(__FILE__)); // pres2 hack

// sample IP
$_SERVER['REMOTE_ADDR'] = "24.100.195.79";

$ip_int = sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));

$country = sqlite_single_query("
SELECT country_name 
FROM ip_ranges ir 
INNER JOIN country_data cd ON ir.country_code=cd.id
WHERE {$ip_int} BETWEEN ip_start AND ip_end",
sqlite_open("./ip.db"));

echo "User is located in {$country}";
?>