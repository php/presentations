<pre>
<?php
	$db = sqlite_open(dirname(__FILE__)."/db.sqlite");
	$res = sqlite_query("SELECT * FROM auth_tbl", $db);
	
	/* fetch each row as an object */
	while (($obj = sqlite_fetch_object($res))) {
		var_dump($obj);
	}
	sqlite_close($db);
?>
</pre>