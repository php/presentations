<?php
	$db = sqlite_open(dirname(__FILE__)."/db.sqlite");
	$res = sqlite_query("SELECT login FROM auth_tbl", $db);

	/* string sqlite_fetch_single(resource result [, bool decode_binary]) */
	while (($login = sqlite_fetch_single($res))) {
		echo $login . "<br />\n";
	}

	sqlite_close($db);
?>
