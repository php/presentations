<?php
chdir(dirname(__FILE__)); // pres2 hack

$db = sqlite_open("./ip.db");
$res = sqlite_array_query($db,
	"SELECT ip_start, ip_end 
	 FROM ip_ranges 
	 WHERE country_code=(SELECT id FROM country_data WHERE country_name='NEW CALEDONIA')", SQLITE_ASSOC);

echo '<pre>';
print_r($res);
echo '</pre>';
?>