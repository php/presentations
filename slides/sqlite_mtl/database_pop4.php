<?php
function check_if_exists($cc)
{
	$result = safe_query("SELECT id FROM country_data WHERE cc_code_2='{$cc}'");

	return sqlite_fetch_array($result) ? TRUE : FALSE;
}

$fp = fopen("./ip-to-country.csv", "r");
// read ip information 1 entry at a time
while (($row = fgetcsv($fp, 4096))) {
	foreach ($row as $key => $val) {
		$row[$key] = sqlite_escape_string($val);
	}

	// country already in database, move along
	if (check_if_exists($row[2])) {
		continue;
	}

	$res = safe_query("INSERT INTO country_data 
		(cc_code_2, cc_code_3, country_name) 
		VALUES('{$row[2]}', '{$row[3]}', '{$row[4]}')");
}
fclose($fp);
?>