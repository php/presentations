<pre>
<?php
	$db = new sqlite_db(dirname(__FILE__)."/db.sqlite");
	
	$res = $db->query("SELECT login FROM auth_tbl");
	while (($login = $res->fetch_single())) {
		echo $login . "\n";
	}

	print_r($db->single_query("SELECT login FROM auth_tbl"));
?>
</pre>