<?php
chdir(dirname(__FILE__)); // pres2 hack

$db = sqlite_open("./ip.db");
$res = sqlite_unbuffered_query(
	"SELECT ip_start, ip_end 
	 FROM ip_ranges 
	 WHERE country_code=(SELECT id FROM country_data WHERE country_name='NEW CALEDONIA')", $db);

echo '<pre>';
print_r(sqlite_fetch_all($res, SQLITE_ASSOC));
echo '</pre>';
?>