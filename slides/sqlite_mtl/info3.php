<?php
$db = new sqlite_db(dirname(__FILE__)."/ip.db");
$r = $db->fetch_column_types("ip_ranges");

echo '<pre>' . print_r($r, true) . '</pre>';
?>