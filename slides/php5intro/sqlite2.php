<?php
$db = new sqlite_db(':memory:');

$db->query("CREATE TABLE foo(c1 date, c2 time, c3 varchar(64))");
$db->query("INSERT INTO foo VALUES ('2002-01-02', '12:49:00', NULL)");

$r = $db->query("SELECT * from foo");

$result = $r->fetch_array();
?> 
