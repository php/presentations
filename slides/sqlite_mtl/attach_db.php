<?php
chdir(dirname(__FILE__)); // pres2 hack
$ip_int = sprintf("%u", ip2long("24.100.195.79"));

$db = sqlite_open("./ip.db");

// attach to another database
sqlite_query("ATTACH DATABASE './flag.db' AS 'flags'", $db);

$data = sqlite_array_query($db, "
SELECT country_name, flag_file
FROM ip_ranges ir 
INNER JOIN country_data cd ON ir.country_code=cd.id
INNER JOIN flags.flag_db f ON f.country_id=cd.id
WHERE {$ip_int} BETWEEN ip_start AND ip_end",
SQLITE_ASSOC);

// detach from attached database
sqlite_query("DETACH DATABASE flags", $db);

echo "User is located in {$data[0]['country_name']}";

// pres2 hackery
$path = dirname($_SERVER['PHP_SELF']). "/../../presentations/slides/sqlite/";

echo " <img src='{$path}{$data[0]['flag_file']}' />";
?>