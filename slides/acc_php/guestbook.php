<?php
	require "./cache.php"; // our cache code

	// Simple guestbook script.
	$db = new SqliteDatabase("gb.sqlite");
	foreach ($db->query("SELECT * FROM guestbook", SQLITE_ASSOC) as $row) {
		echo $r->user . ' wrote on ' . date("Ymd", $r->date) . ":<br />\n";
		echo $r->message . "<hr /><hr />";
	}
?>