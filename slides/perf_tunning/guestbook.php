<?php
	require "./cache.php"; // our cache code

	// Simple guestbook script.
	$db = new sqlite_db("gb.sqlite");
	$r = $db->array_query("SELECT * FROM guestbook", SQLITE_ASSOC);
	foreach ($r as $row) {
		echo $r->user . ' wrote on ' . date("Ymd", $r->date) . ":<br />\n";
		echo $r->message . "<hr /><hr />";
	}
?>