<?php
define('sqlite_r', sqlite_open("./ip.db"));

function safe_query($query)
{
	$res = sqlite_query($query, sqlite_r);
	if (!$res) {
		$err_code = sqlite_last_error(sqlite_r);
		printf("Query Failed %d:%s\n", 
				$err_code,
				sqlite_error_string($err_code));
		exit;
	}
	return $res;
}

sqlite_query("BEGIN", sqlite_r);
$fp = fopen("./ip-to-country.csv", "r");
$query_str = '';
while (($row = fgetcsv($fp, 4096))) {
	foreach ($row as $key => $val) {
		$row[$key] = sqlite_escape_string($val);
	}

	if (!($country_id = sqlite_single_query("SELECT id FROM country_data WHERE cc_code_2='{$row[2]}'", sqlite_r))) {
		$res = safe_query("INSERT INTO country_data 
			(cc_code_2, cc_code_3, country_name) 
			VALUES('{$row[2]}', '{$row[3]}', '{$row[4]}')");
		$country_id = sqlite_last_insert_rowid(sqlite_r);
	}

	$query_str .= "INSERT INTO ip_ranges 
			(ip_start, ip_end, country_code)
			VALUES({$row[0]}, {$row[1]}, {$country_id});";
}
safe_query($query_str, sqlite_r);
sqlite_query("COMMIT", sqlite_r);
fclose($fp);
sqlite_close(sqlite_r); // close database
?>