<?php
$res = safe_query("INSERT INTO country_data 
	(cc_code_2, cc_code_3, country_name) 
	VALUES('{$row[2]}', '{$row[3]}', '{$row[4]}')");

// determine the id of the last inserted country
$country_id = sqlite_last_insert_rowid(sqlite_r);
?>