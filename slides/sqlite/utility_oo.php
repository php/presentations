<?php
	$db = new sqlite_db(dirname(__FILE__)."/db.sqlite");
	$res = $db->query("SELECT * FROM auth_tbl");
	
	/* return number of rows selected */
	echo "Rows Fetched: " . $res->num_rows() . "<br />\n";

	/* determine the number of columns in the result set */
	echo "Columns per row " . ($n_cols = $res->num_fields()) . "<br />\n";
	
	for ($i = 0; $i < $n_cols; $i++) {
		/* fetch column names */
		echo "Column Names: " . $res->field_name($i) . "<br />\n";
	}
?>
