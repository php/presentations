<?php
	$db = sqlite_open(dirname(__FILE__)."/db.sqlite");

	echo '<pre>';
	/* array sqlite_array_query(string query, resource db [ , int result_type [, bool decode_binary]]) */
	var_dump(sqlite_array_query("SELECT * FROM auth_tbl", $db, SQLITE_ASSOC));
	echo '</pre>';
	
	sqlite_close($db);
?>