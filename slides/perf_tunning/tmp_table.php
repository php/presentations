<?php
// Quickly fetch the ids of needed messages
mysql_query("CREATE TEMPORARY TABLE mtmp AS 
	SELECT id FROM msg WHERE 
		thread_id={$_GET['th']} AND apr=1 
		ORDER BY id ASC LIMIT {$count}, {$_GET['start']}");

// Retrieve needed data by using the temporary table as base
$result = mysql_query("SELECT * FROM mtmp mt
		INNER JOIN msg m ON m.id=mt.id
		INNER JOIN thread t ON m.thread_id=t.id
		INNER JOIN forum f ON t.forum_id=f.id
		LEFT JOIN users u ON m.poster_id=u.id
		LEFT JOIN level l ON u.level_id=l.id
		LEFT JOIN poll p ON m.poll_id=p.id
		LEFT JOIN poll_opt_track pot ON pot.poll_id=p.id 
			AND pot.user_id="._uid." 
		ORDER BY m.id ASC");
?>