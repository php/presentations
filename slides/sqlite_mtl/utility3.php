<?php
	$db = sqlite_open(":memory:");

	sqlite_query("CREATE TABLE foobar (misc CHAR(10))", $db);
	sqlite_query("INSERT INTO foobar (misc) VALUES('Wez')", $db);

	/* number of rows affected by DELETE, UPDATE, INSERT and REPLACE */
	echo "Number of affected rows: " . sqlite_changes($db) . " by insert.<br />\n";

	/* WHERE 1 is necessary to ensure that SQLite counts the deleted rows */
	sqlite_query("DELETE FROM foobar WHERE 1", $db);
	echo "Number of affected rows: " . sqlite_changes($db) . " by delete.<br />\n";

	sqlite_close($db);
?>
