<?php 
  $db = mdb_open("test.mdb");

  foreach (mdb_tables($db) as $name) {
    echo "$name:\n";

    $tab = mdb_table_open($db, $name);

    print_r(mdb_table_indexes($tab));

    mdb_table_close($tab);

	echo "\n\n";
  }

  mdb_close($db);
?>