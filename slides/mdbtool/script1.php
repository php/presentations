<?php 

  $db = mdb_open("test.mdb");

  print_r(mdb_tables($db, true /* include system tables */))

  mdb_close($db);
?>
