<?php
$b = sqlite_array_query($db,
	"SELECT * FROM bar WHERE id=(SELECT id FROM foo WHERE name='ilia')");
?>