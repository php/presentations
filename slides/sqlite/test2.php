<?php
	$db = sqlite_open("./ip.db");
	$res = sqlite_query("SELECT id FROM country_data WHERE cc_code_2='US'", $db);
	var_dump(sqlite_fetch_array($res, SQLITE_NUM));
?>