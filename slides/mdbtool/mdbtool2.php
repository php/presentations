<?php
  dl("mdbtools.so");

  $db = mdb_open("test.mdb");

  $tables = mdb_tables($db, true);

  foreach ($tables as $name) {
    echo "$name:\n";

    $tab = mdb_table_open($db, $name);

    $n = 0;
    while ($row = (mdb_fetch_assoc($tab))) {
      var_dump($row);
      $n++;
    }

    echo "Rows: $n\n\n";

    mdb_table_close($tab);
  }

  mdb_close($db);
?>
