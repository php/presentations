<?php
	$db = sqlite_open(dirname(__FILE__)."/db.sqlite");

	/* CREATE TABLE auth_tbl (login VARCHAR(32), passwd CHAR(32)); */
	$result = sqlite_query("SELECT * FROM auth_tbl", $db);

	echo '<pre>';
	/* array sqlite_fetch_array(resource result [, int result_type [, bool decode_binary]] ) */
	while (($row = sqlite_fetch_array($result))) {
		print_r($row);
	}
	echo '</pre>';

	sqlite_close($db);
?>