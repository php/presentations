<?php
$db = new SQLiteDatabase("./ip.db");

// No triggers
$c = $db->query("SELECT country_code, count(*) 
	ip_ranges GROUP BY country_code", SQLITE_NUM);
foreach ($c as $row) {
	$db->query("UPDATE country_data SET 
		ipc=".(int)$row[1]." WHERE id=".(int)$row[0]);
}

// Simple trigger added before any inserts 
// will take care of everything automatically
$db->query("CREATE TRIGGER upc 
AFTER INSERT ON ip_ranges 
BEGIN 
UPDATE country_data SET ipc=ipc+1 WHERE id=new.country_code;
END"); 
?>