<?php
// open database
$db = new SQLiteDatabase("./ip.db");

// begin transaction
$db->query("BEGIN");
$fp = fopen("./ip-to-country.csv", "r");
$query_str = '';
while (($row = fgetcsv($fp, 4096))) {
	foreach ($row as $key => $val) {
		// secure data
		$row[$key] = sqlite_escape_string($val);
	}

	// check for existance of a country in db
	if (!($country_id = $db->singleQuery("SELECT id FROM country_data WHERE cc_code_2='{$row[2]}'"))) {
		// add new country
		if (!$db->query("INSERT INTO country_data 
			(cc_code_2, cc_code_3, country_name) 
			VALUES('{$row[2]}', '{$row[3]}', '{$row[4]}')")) {

			// fetch error
			$err_code = $db->lastError();
			printf("Query Failed %d:%s\n", 
				$err_code,
				sqlite_error_string($err_code));
			exit;		
		}
		// get ID for the last inserted row
		$country_id = $db->lastInsertRowid();
	}

	$query_str .= "INSERT INTO ip_ranges 
			(ip_start, ip_end, country_code)
			VALUES({$row[0]}, {$row[1]}, {$country_id});";
}
// insert IP data via a chained query
$db->query($query_str);
// finalize transaction
$db->query("COMMIT");
fclose($fp);
// close database 'hack'
unset($db);
