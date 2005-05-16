<?php
/* open connection to memory database */
$db = new SQLiteDatabase(":memory:");

/* execute a regular query */
$db->query("CREATE TABLE test(a,b)");
$db->query("INSERT INTO test VALUES('1','2')");

/* retrieve data using an unbuffered query */
$r = $db->unbufferedQuery("SELECT * FROM test", SQLITE_ASSOC);
echo '<pre>';
/* use object iterators to retrieve the data, without any additional functions */
foreach ($r as $row) {
	print_r($row);
}
echo '</pre>';
?>