<?php
$db = new sqlite_db(dirname(__FILE__)."/ip.db");
$r = $db->array_query("SELECT * FROM sqlite_master LIMIT 1", SQLITE_ASSOC);

echo '<pre>' . print_r($r, true) . '</pre>';
?>
