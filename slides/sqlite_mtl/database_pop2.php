<?php
$db = sqlite_open("./ip.db");
	
$fp = fopen("./ip-to-country.csv", "r");
// read ip information 1 entry at a time
while (($row = fgetcsv($fp, 4096))) {
	// secure data
	foreach ($row as $key => $val) {
		$row[$key] = sqlite_escape_string($val);
	}

	sqlite_query("INSERT INTO country_data 
		(cc_code_2, cc_code_3, country_name) 
		VALUES('{$row[2]}', '{$row[3]}', '{$row[4]}')", 
		$db);
}
fclose($fp);
?>