<?php
// slow joinless approach
$a = sqlite_fetch_single($db, "SELECT id FROM foo WHERE name='ilia'");
$b = sqlite_array_query($db, "SELECT * FROM bar WHERE id={$a}");

// Fast Join implementation
$b = sqlite_array_query($db,
	"SELECT b.* FROM foo f INNER JOIN bar b ON f.id=b.id WHERE f.name='ilia'");
?>