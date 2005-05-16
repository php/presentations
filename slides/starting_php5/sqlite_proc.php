<?php
function encode($str)
{
	return base64_encode(urlencode($str));
}

$db = sqlite_open(":memory:"); // open database

/* create my functions */
sqlite_create_function($db, 'p_enc', 'encode', 1);
sqlite_create_function($db, 'p_md5', 'md5', 1);

sqlite_query($db, "CREATE TABLE test(a,b)");
sqlite_query("INSERT INTO test VALUES(p_enc('1'),p_md5('2'))", $db);

echo '<pre>';
print_r(sqlite_array_query($db, "SELECT * FROM test", SQLITE_NUM));
echo '</pre>';
?>