<?php
// Slow Approach
for ($i = 0; $i < 10; $i++)
	mysql_query("INSERT INTO foo VALUES({$i})");

// Faster MySQL/SQLite Specific approach
$query = "INSERT INTO foo VALUES";
$query = "(" . implode("),(", array_keys(array_fill(0, 10, 1))) . ")";
// INSERT INTO foo VALUES (0), (1), (2) ...
mysql_query($query);

// Query Chaining
// for DBs that support it PostgreSQL, MSSQL, SQLite, MySQL 4.0+
$query = '';
for ($i = 0; $i < 10; $i++)
	$query .= "INSERT INTO foo VALUES({$i});";
mysql_query($query);
?>
