<?php
function check_if_exists($cc)
{
	$result = safe_query("SELECT id FROM country_data WHERE cc_code_2='{$cc}'");

	$data = sqlite_fetch_array($result, SQLITE_NUM);
	// return the id or NULL if no data is avaliable
	return $data ? $data[0] : NULL;
}

$fp = fopen("./ip-to-country.csv", "r");
// read ip information 1 entry at a time
while (($row = fgetcsv($fp, 4096))) {
	foreach ($row as $key => $val) {
		$row[$key] = sqlite_escape_string($val);
	}

	if (!($country_id = check_if_exists($row[2]))) {
		// only insert country data if the country 
		// was not previously encountered
		$res = safe_query("INSERT INTO country_data 
			(cc_code_2, cc_code_3, country_name) 
			VALUES('{$row[2]}', '{$row[3]}', '{$row[4]}')");
		$country_id = sqlite_last_insert_rowid(sqlite_r);
	}

	// insert ip range entry
	safe_query("INSERT INTO ip_ranges 
			(ip_start, ip_end, country_code)
			VALUES({$row[0]}, {$row[1]}, {$country_id})");
}
fclose($fp);
?>