<?php
$db = sqlite_open(":memory:");

sqlite_query("CREATE TABLE foobar (
	id INTEGER PRIMARY KEY,
	misc CHAR(10)
)", $db);

sqlite_query("
	INSERT INTO foobar (misc) VALUES ('Wez');
	INSERT INTO foobar (misc) VALUES ('Ilia');
", $db);
	
// return the last ID
echo sqlite_last_insert_rowid($db) . "<br />\n";

sqlite_close($db);
?>
