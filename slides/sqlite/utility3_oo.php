<?php
$db = new sqlite_db(":memory:");
$db->query("CREATE TABLE foobar (misc CHAR(10))");
$db->query("INSERT INTO foobar (misc) VALUES('Tall')");

$db->query("
	INSERT INTO foobar (misc) VALUES('Wez');
	INSERT INTO foobar (misc) VALUES('Marcus');
	INSERT INTO foobar (misc) VALUES('Ilia');
	UPDATE foobar SET misc='Tal' WHERE misc='Tall';
");

/* When chained queries are used rows changed returns the
 * cumulative of all rows affected by executed queries. */
echo $db->changes() . "rows affected by chained query.";
?>
