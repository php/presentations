<pre>
<?php
$db = new sqlite_db(dirname(__FILE__)."/db.sqlite");

foreach($db->query("SELECT * FROM auth_tbl", SQLITE_NUM) as $row) {
	print_r($row);
}
?>
</pre>