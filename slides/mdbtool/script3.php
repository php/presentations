<html>
 <head><title>MDB tables as HTML</title></head>
<body>
<?php
  // open file
  $db = mdb_open("test.mdb");

  // iterate over all tables
  foreach ( mdb_tables($db) as $name) {
    echo "<h1>$name</h1>\n";

    $tab = mdb_table_open($db, $name);

    // show column names
	echo "<table border='1'>\n";
    echo " <tr>";
    foreach (mdb_table_fields($tab) as $field) {
		echo "<th>".$field['name']."</th>";
	}
	echo "</tr>\n";

    // iterate over all rows
    $n = 0;
    while ($row = (mdb_fetch_row($tab))) {
		echo " <tr>";
		foreach ($row as $val) {
			echo "<td>".htmlentities($val)."</td>";
		}
		echo "</tr>\n";
		$n++;
    }
	echo "</table>\n";

    echo "<p>Rows: $n</p><hr>\n";

    mdb_table_close($tab);
  }

  mdb_close($db);
?>
</body>
