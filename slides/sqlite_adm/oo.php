<pre>
<?php
$db = sqlite_open(dirname(__FILE__)."/ip.db");
$res = sqlite_query("SELECT * FROM country_data LIMIT 2", $db);
	
while (($obj = sqlite_fetch_object($res))) {
	print_r($obj);
}

sqlite_close($db);
?>
</pre>