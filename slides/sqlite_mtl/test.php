<?php
	$db = sqlite_open("db2.sqlite");
/*	
	sqlite_query("CREATE TABLE auth_tbl (login VARCHAR(32), passwd CHAR(32))", $db);
	sqlite_query("INSERT INTO auth_tbl (login, passwd) VALUES('root', '0b2c539c3e7f85d808df3f2dfe8906b9')", $db);
	sqlite_query("INSERT INTO auth_tbl (login, passwd) VALUES('ilia', '63a9f0ea7bb98050796b649e85481845')", $db);


function getmicrotime()
{
        $tm_ar = gettimeofday();
	return  ($tm_ar['sec']+$tm_ar['usec']/1000000);
}
                

	$str = 'BEGIN;';
	for ($i = 0; $i < 10000; $i++) {
		$str .= "INSERT INTO foo VALUES('a','b','c');";
	}
	$str .= 'COMMIT;';
	
	sqlite_query("CREATE TABLE foo (a VARCHAR(32), b CHAR(32), c CHAR(32))", $db);
	sqlite_query($str, $db);
	
	$s = getmicrotime();

	$r = sqlite_unbuffered_query("SELECT * FROM foo", $db);
	while (sqlite_has_more($r)) {
		sqlite_current($r, SQLITE_NUM);
		sqlite_next($r);
	}
	$e = getmicrotime();

	echo "Time Taken: ".($e-$s)."\n";


	$s = getmicrotime();
	$r = sqlite_unbuffered_query("SELECT * FROM foo", $db);
	while (sqlite_fetch_array($r, SQLITE_NUM));
	$e = getmicrotime();
	echo "Time Taken: ".($e-$s)."\n";

	$db = new sqlite_db("db2.sqlite");

	$s = getmicrotime();
	$r = $db->unbuffered_query("SELECT * FROM foo", SQLITE_NUM);
	foreach($r as $row);
	$e = getmicrotime();
	echo "Time Taken: ".($e-$s)."\n";


	sqlite_query("DROP TABLE messages", $db);
	sqlite_query("CREATE TABLE messages ( timestamp INTEGER, title VARCHAR(255) )", $db);
	sqlite_query("DROP TABLE profile", $db);
	sqlite_query("CREATE TABLE profile ( time_format VARCHAR(255), login VARCHAR(255) )", $db);
	sqlite_query("INSERT INTO profile (login, time_format) VALUES('ilia', 'l dS of F Y h:i:s A')", $db);
	for ($i = 0; $i < 5; $i++) {
		sqlite_query("INSERT INTO messages (timestamp, title) VALUES(".rand(time(), (time() + 86400 * 365)).", 'message #{$i}')", $db);
	}
*/
	sqlite_query("PRAGMA show_datatypes = ON", $db);
//	sqlite_query("PRAGMA full_column_names = ON", $db);
	print_r(sqlite_array_query("SELECT * FROM messages", $db));

	sqlite_close($db);
?>