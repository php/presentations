<?php
// make the sqlite resource a constant
// so that I don't need to pass the variable
// all the time.
define('sqlite_r', sqlite_open("./ip.db"));

function safe_query($query)
{
	$res = sqlite_query($query, sqlite_r);
	if (!$res) { // query failed
		// numeric error code
		$err_code = sqlite_last_error(sqlite_r);
		printf("Query Failed %d:%s\n", 
				$err_code,
				sqlite_error_string($err_code));
		exit;
	}
	return $res;
}

$fp = fopen("./ip-to-country.csv", "r");
// read ip information 1 entry at a time
while (($row = fgetcsv($fp, 4096))) {
	foreach ($row as $key => $val) {
		$row[$key] = sqlite_escape_string($val);
	}

	$res = safe_query("INSERT INTO country_data 
		(cc_code_2, cc_code_3, country_name) 
		VALUES('{$row[2]}', '{$row[3]}', '{$row[4]}')");
}
fclose($fp);
?>