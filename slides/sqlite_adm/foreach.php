<pre>
<?php
$db = new SQLiteDatabase(dirname(__FILE__)."/ip.db");

$res = $db->unbufferedQuery("SELECT * FROM country_data WHERE cc_code_2='CA'", SQLITE_ASSOC);

foreach($res as $row) {
	print_r($row);
}
?>
</pre>