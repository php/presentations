<?php
$fp = fopen("./ip-to-country.csv", "r");
// read ip information 1 entry at a time
while (($row = fgetcsv($fp, 4096))) {
	foreach ($row as $key => $val) {
		$row[$key] = sqlite_escape_string($val);
	}

	if (check_if_exists($row[2])) {
		continue;
	}

	$res = safe_query("INSERT INTO country_data 
		(cc_code_2, cc_code_3, country_name) 
		VALUES('{$row[2]}', '{$row[3]}', '{$row[4]}')");

	$country_id = sqlite_last_insert_rowid(sqlite_r);

	// insert ip range entry
	safe_query("INSERT INTO ip_ranges 
			(ip_start, ip_end, country_code)
			VALUES({$row[0]}, {$row[1]}, {$country_id})");
}
?>