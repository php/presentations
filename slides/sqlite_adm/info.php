<?php
$db = new SQLiteDatabase(dirname(__FILE__)."/ip.db");
$r = $db->arrayQuery("SELECT * FROM sqlite_master LIMIT 1", SQLITE_ASSOC);

echo '<pre>' . print_r($r, true) . '</pre>';
?>
