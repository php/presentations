<?php
	$db = sqlite_open(dirname(__FILE__)."/db.sqlite");

	$result = sqlite_query("SELECT * FROM auth_tbl LIMIT 1", $db);

	echo '<pre>';
	while (($row = sqlite_fetch_array($result, SQLITE_NUM))) 
		print_r($row);
	echo '</pre>';
?>