<?php
	mmcache_cache_page(__FILE__, 600); // MMcache cache

	// Simple guestbook script.
	$db = new sqlite_db("gb.sqlite");
	$r = $db->array_query("SELECT * FROM guestbook", SQLITE_ASSOC);
	foreach ($r as $row) {
		echo $r->user . ' wrote on ' . date("Ymd", $r->date) . ":<br />\n";
		echo $r->message . "<hr /><hr />";
	}
?>