<?php
chdir(dirname(__FILE__)); // pres2 hack

$db = sqlite_open("./ip.db");
$result = sqlite_single_query("SELECT country_name FROM country_data WHERE country_name LIKE 'U%'", $db);
foreach ($result as $country) {
	echo $country . "<br />\n";
}
?>
