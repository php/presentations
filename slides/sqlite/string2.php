<pre>
<?php
	$db = sqlite_open(dirname(__FILE__)."/db.sqlite");

	print_r(sqlite_single_query("SELECT login FROM auth_tbl", $db));

	sqlite_close($db);
?>
</pre>