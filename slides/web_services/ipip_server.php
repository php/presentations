<?php
function encode($str)
{
	return str_pad(strlen($str), 10, "0", STR_PAD_LEFT) . $str;
}

if (!empty($_GET['q'])) {
	$query = sqlite_escape_string($_GET['q']);

	/* Query SQLite database */
	$db = new sqlite_db("my_db.sqlite");
	$result = $db->array_query("SELECT id, descr FROM bug_db WHERE dev='{$query}'");

	/* If there are results, encode them using IPIP and send to client */
	if (($rows = count($result))) {
		echo str_pad($rows, 10, "0", STR_PAD_LEFT);
		foreach ($result as $ent) {
			echo encode($ent['id']) . encode($ent['descr']);
		}
		exit;
	}
}
echo str_repeat("0", 10);
?>