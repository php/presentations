<?php
  dl("mdbtools.so");

  $db = mdb_open("test.mdb");

  $tables = mdb_tables($db, true);

  foreach ($tables as $name) {
    echo "$name:\n";
    $tab = mdb_table_open($db, $name);

    $fields = mdb_table_fields($tab);

    print_r($fields);

    mdb_table_close($tab);
    echo "\n\n";
  }
  mdb_close($db);
?>
