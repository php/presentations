<pre>
<?php
	$db = sqlite_open(dirname(__FILE__)."/db.sqlite");
	$res = sqlite_query("SELECT login FROM auth_tbl", $db);

	/* got rows? */
	while (sqlite_has_more($res)) {
		/* fetch one row */
		print_r(sqlite_current($res, SQLITE_NUM));
		
		/* move along */
		sqlite_next($res);
	}

	sqlite_close($db);
?>
</pre>