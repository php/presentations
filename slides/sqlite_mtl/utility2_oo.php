<?php
	$db = new sqlite_db(":memory:");
	$db->query("CREATE TABLE foobar (id INTEGER PRIMARY KEY, misc CHAR(10))");
	$db->query("INSERT INTO foobar (misc) VALUES('Marcus');
			INSERT INTO foobar (misc) VALUES('Ilia')");

	/* When performing multiple inserts within a single query 
	 * only the id of very last insert is returned */
	echo "Last id: " . $db->last_insert_rowid() . "<br />\n";

	echo '<pre>';
	print_r($db->array_query("SELECT * FROM foobar", SQLITE_ASSOC));
	echo '</pre>';
?>
