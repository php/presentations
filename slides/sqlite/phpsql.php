<?php
$db = sqlite_open(dirname(__FILE__)."/db2.sqlite");

/* arguments:
 * 1 database resource
 * 2 sqlite function name
 * 3 php function name
 * 4 number of arguments (optional)
 */

sqlite_create_function($db, "my_date", "date", 2);

/* 
 * The above function makes PHP date() avaliable 
 * from SQLite as my_date() and for highest 
 * performance indicates that it requires 
 * exactly 2 arguments 
 */

$res = sqlite_array_query("
	SELECT title, 
	my_date((SELECT time_format FROM profile WHERE login='ilia'), timestamp) AS date
	FROM messages", $db, SQLITE_ASSOC);

foreach ($res as $v) {
	echo $v['title'] . " was posted on " . $v['date'] . "<br />\n";
}
?>