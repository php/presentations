<?php
	$db = sqlite_open(dirname(__FILE__)."/db.sqlite");

	$result = sqlite_query("SELECT * FROM auth_tbl", $db);
	
	echo '<pre>';
	/* array sqlite_fetch_all(resource result [, int result_type [, bool decode_binary]]) */
	var_dump(sqlite_fetch_all($result, SQLITE_ASSOC));
	echo '</pre>';
	
	sqlite_close($db);
?>