<?php
$db = sqlite_open(dirname(__FILE__)."/db.sqlite");
$res = sqlite_query("SELECT * FROM auth_tbl", $db);
	
// return number of rows selected
echo "Rows Fetched: " . sqlite_num_rows($res) . "<br />\n";

// determine the number of columns in the result set
echo "Columns per row ".($n_cols = sqlite_num_fields($res))."<br />\n";
	
for ($i = 0; $i < $n_cols; $i++) {
	// fetch column names
	echo "Column Names: " . sqlite_field_name($res, $i) . "<br />\n";
}

sqlite_close($db);
?>
